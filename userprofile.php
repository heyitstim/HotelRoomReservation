<?php
session_start();
?>
<?php
    //Connect to Database//
    $conn=null;
    function connect_to_database($host_name,$user_name,$pass,$db_name,$open_db){
        $conn = mysqli_connect($host_name,$user_name,$pass,$db_name);
        if($open_db==true){
            
            if(mysqli_errno($conn)){
                die("Could not connnect to database. <br/>");
            }else{
            //    echo "connected to database";
                return $conn;
            }
        }else{
            echo "Database Closed <br/>";
            mysqli_close($conn);
        }
    }
    //Crud Operation
    // C = add
    function add_to($table,$columns,$values){
        
        $conn=connect_to_database('localhost:3306','root','','pet_malu_hotel_reservation',true);
        $query='insert into '.$table.' ';
        $query.='('.$columns.') ';
        $query.='values ';
        $query.='('.$values.')';
        echo $query.'<br>';
        $result=mysqli_query($conn,$query);
        if(!$result){
            return FALSE;
        }
        //4. Release Data From Result
        //mysqli_free_result($result);
        //5. Close Connection
        mysqli_close($conn);
        return TRUE;
    }
        //R = Return a second query
    function return_values2($select,$from,$where){
        $conn=connect_to_database('localhost','root','','pet_malu_hotel_reservation',true);
        $query2="select ".$select." from ".$from."".$where;
        //echo $query2;
        $result2 = mysqli_query($conn,$query2);
        if(!$result2){
            die("Query Failed");
        }else {
            $cLine2 = array();
            //3. Use Returned Rows //
            while($row2 = mysqli_fetch_assoc($result2)){
                       $cLine2 [] = array($row2['u_fullname'],$row2['r_id'],$row2['r_rtype'],$row2['r_pmethod'],$row2['r_rate'],$row2['r_arrivdate'],$row2['r_deptdate'],$row2['r_payment']);     
            }
            //4. Release Data From Result
            mysqli_free_result($result2);
            //5. Close Connection
           mysqli_close($conn);
            
            return $cLine2;
        }

    }
    //Update
    function update_values($table,$set,$where){
        $query='update '.$table.' set '.$set.' where '.$where;
        $conn=connect_to_database('localhost','root','','pet_malu_hotel_reservation',true);
        $result = mysqli_query($conn,$query);
        mysqli_close($conn);
    }
    //Delete
    function delete_values($from,$where){
        $conn=connect_to_database('localhost','root','','pet_malu_hotel_reservation',true);
        $query='delete from '.$from.' where '.$where.';';
      //  echo $query;
        mysqli_query($conn,$query);
        mysqli_close($conn);
        return true;
    }
        function return_values($select,$from,$where){
        $conn=connect_to_database('localhost','root','','pet_malu_hotel_reservation',true);
        $query="select ".$select." from ".$from." where ".$where;
    //    echo $query;
        $result = mysqli_query($conn,$query);
        if(!$result){
            die("Query Failed");
        }else {
            $cLine = array();
            //3. Use Returned Rows //
            while($row = mysqli_fetch_assoc($result)){
              $cLine [] = array($row['u_id'],$row['u_fullname'],$row['u_name'],$row['u_email'],$row['u_tel']);
                //print_r($row);
        }
                  //4. Release Data From Result
            mysqli_free_result($result);
                 //5. Close Connection
          mysqli_close($conn);
           return $cLine;

    }
    }
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="./styles/styles.css">
        <link rel="stylesheet" href="./styles/uikit.min.css">
        <script src="./scripts/uikit.min.js"></script>
        <title></title>

        <style>
            body{ background-color: #576884;}
            tr {background-color: #f2f2f2;}
        </style>
    </head>
    <body>

            <div id="banner" class="site-header col-12">
        
        <h3>PET MALU HOTEL<br/>
            <span>Welcome !</span>
        </h3>
        <nav class="main-nav">
            <ul>
                <li><a class="border" href="reservation.php?location=&type=Single">NEW RESERVATION</a></li>
    
                <li><a class="border" href="logout.php">LOG OUT</a></li>
            </ul>
        </nav>
    </div>



        
                    
                
        
            
        
        <center>
         <?php
        $cline = return_values("u_id,u_fullname,u_name,u_email,u_tel","users","u_id = ".$_SESSION["userid"]);
        for($i = 0; $i<sizeof($cline);$i++){  
        echo '<div class="uk-card uk-card-default uk-width-1-2@m">
        <div class="uk-card-header">
            <div class="uk-grid-small uk-flex-middle" uk-grid>
                <div class="uk-width-auto">';  
         
         echo '</div>
                <div class="uk-width-expand">   
                    <h3>Hi There! '.$cline[$i][1].'</h3>
                    <p class="uk-text-meta uk-margin-remove-top">Looking Awesome!</p>
                </div>
            </div>
        </div>';
         echo '<div class="uk-card-body">';
         echo '<b>Username: '.$cline[$i][2]. '</b><br>';
         echo '<b>Email: '.$cline[$i][3].'</b><br>';
         echo '<b>Contact No. : '.$cline[$i][4]. '</b><br>';
         echo '<a href = "editprofile.php?sid='.$_SESSION["userid"].'" >Edit Profile</a><br>';
         echo '</div></div>';
         }
        // <p name ="logout" style="text-align: right"><a href="logout.php" >Log Out!</a></p>
         ?>
         </center>
        <table class="uk-table"> 
                <thead>
             <tr>
                 <td>
                     <b> Full Name</b>
                 </td><td>
                     <b> Reservation ID</b>
                 </td><td>
                     <b> Reservation Room Type</b>
                 </td><td>
                     <b>Payment Method</b>
                 </td><td>
                     <b> Current Room Rate</b>
                 </td><td>
                     <b>Arrival Date</b>
                 </td><td>
                     <b>Departure Date</b>
                 </td><td>
                     <b>Payment To Be Made</b>
                 </td><td>
                     <b>ACTIONS</b>
                 </td>
             </tr>
         </thead>
         <tbody>
             <?php
             $cline2 = return_values2("users.u_fullname,reservation.r_id,reservation.r_rtype,reservation.r_pmethod,rooms.r_rate,reservation.r_arrivdate,reservation.r_deptdate,reservation.r_payment", "reservation LEFT JOIN rooms ON rooms.r_rtype = reservation.r_rtype LEFT JOIN users ON reservation.u_id = users.u_id ","WHERE reservation.u_id = '".$_SESSION["userid"]."'",1);
            // echo '<span class="uk-label"><b>Your Current Reservation:'.sizeof($cline2).'</span>'; 
             for($i = 0; $i<sizeof($cline2);$i++){
                  echo '
              <tr>
                 <td>
                    '.$cline2[$i][0].'
                 </td><td>
                    '.$cline2[$i][1].'
                 </td><td>
                     '.$cline2[$i][2].'
                 </td><td>
                     '.$cline2[$i][3].'
                 </td><td>
                     '.$cline2[$i][4].'
                 </td><td>
                     '.$cline2[$i][5].'
                 </td><td>
                      '.$cline2[$i][6].'
                 </td><td>
                      P '.$cline2[$i][7].'
                 </td><td>
                     <a class="uk-button uk-button-primary" href="userprofile.php?qq='.$cline2[$i][1].'&x='.$cline2[$i][2].'">REMOVE</a>
                 </td>
             </tr>
                  ';
              }
              if(isset($_GET['d'])){
                  update_values("`".$_GET['x']."`","u_id=NULL,rm_avail='Available',r_id=NULL","r_id=".$_GET['d']);
                  delete_values("reservation", "r_id=".$_GET['d']);
                  echo '<meta http-equiv="refresh" content="3; URL=userprofile.php"><meta name="keywords" content="automatic redirection">';
              }
             
             ?>
            </tbody>
            <div>
                
                
            </div>
    </body>
</html>
