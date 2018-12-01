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
    //R = Return a query
    function return_values($select,$from){
        $conn=connect_to_database('localhost','root','','pet_malu_hotel_reservation',true);
        $query="select ".$select." from ".$from;
        //echo $query;
        $result = mysqli_query($conn,$query);
        if(!$result){
            die("Query Failed");
        }else {
            $cLine = array();
            //3. Use Returned Rows //
            while($row = mysqli_fetch_assoc($result)){
                $cLine [] = array($row['u_id'],$row['u_fullname'],$row['u_name'],$row['u_pass'],$row['u_addr'],$row['u_email'],$row['u_tel']);
                //print_r($row);
        }
                  //4. Release Data From Result
            mysqli_free_result($result);
                 //5. Close Connection
          mysqli_close($conn);
           return $cLine;

    }
    }
        //R = Return a second query
    function return_values2($select,$from){
        $conn2=connect_to_database('localhost','root','','pet_malu_hotel_reservation',true);
        $query2="select ".$select." from ".$from;
    //   echo $query2;
        $result2 = mysqli_query($conn2,$query2);
        if(!$result2){
            die("Query Failed");
        }else {
            $cLine2 = array();
            //3. Use Returned Rows //
            while($row2 = mysqli_fetch_assoc($result2)){
                       $cLine2 [] = array($row2['u_fullname'],$row2['r_id'],$row2['r_rnum'],$row2['r_rtype'],$row2['r_pmethod'],$row2['r_rate'],$row2['r_arrivdate'],$row2['r_deptdate'],$row2['r_payment']);
                   //    print_r($row2);            
            }
            //4. Release Data From Result
            mysqli_free_result($result2);
            //5. Close Connection
            mysqli_close($conn2);
            
            return $cLine2;
        }

    }
    //Update
    function update_values($table,$set,$where){
        $query='update '.$table.' set '.$set.' where '.$where;
        $conn=connect_to_database('localhost','root','','pet_malu_hotel_reservation',true);
        $result = mysqli_query($conn,$query);
     //   echo $query;
      //  mysqli_close($conn);
    }
    //Delete
    function delete_values($from,$where){
        $conn=connect_to_database('localhost','root','','pet_malu_hotel_reservation',true);
        $query='delete from '.$from.' where '.$where.';';
     //   echo $query;
        mysqli_query($conn,$query);
        mysqli_close($conn);
        return true;
    }
?>
<html>
<head>
	<title> </title>
    <link rel="stylesheet" type="text/css" href="./styles/styles.css">
    <link rel="stylesheet" type="text/css" href="./styles/uikit.min.css">
	<!--<link rel="stylesheet" type="text/css" href="./styles/style1.css">-->
    <script src="./scripts/uikit.min.js"></script>
</head>
<body>
   
    <div id="header-container">
                <div id= "title-noemi" class="title"> Hotel Online Booking     </div>

    <div id="banner" class="site-header col-12">
        
        <h3>PET MALU HOTEL<br/>
            <span>Hello Admin! </span>
        </h3>
        <nav class="main-nav">
            <ul>
                <li><a class="border" href="admin.php">ADMIN HOME</a></li>
                <li><a class="border" href="managerooms.php">MANAGE ROOMS</a></li>
                <li><a class="border" href="logout.php">LOG OUT</a></li>
            </ul>
        </nav>
    </div>

    <style>
        tr {background-color: #f2f2f2;}
       body{ background-color: #576884;
                height: 1500px;
       }
       p { color: #ffffb3; 
            text-align: left;
            font-size: 15px;
            font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
            padding-left: 150px;
        }
        h1 {
            color: #ffffff; 
            text-align: center;
            font-size: 40px;
            font-family: Butterfly;
        }






    </style>

    <h1><b>MANAGE USER</b></h1>
            <table class="uk-table"> 
             <tr>
                 <td>
                     <b> User ID</b>
                 </td><td>
                     <b> User Full Name</b>
                 </td><td>
                     <b> Username</b>
                 </td><td>
                     <b>User Password</b>
                 </td><td>
                     <b>User Address</b>
                 </td><td>
                     <b> User Email</b>
                 </td><td>
                     <b>User Cellphone Num</b>
                 </td><td>
                     <b>ACTIONS</b>
                 </td>
             </tr>
             <?php
              $cline = return_values("*","users");
           //  echo '<p><b>TOTAL USERS :'.sizeof($cline).'</b></p> ';
              for($i = 0; $i<sizeof($cline);$i++){ 
                  echo '
              <tr>
                 <td>
                    '.$cline[$i][0].'
                 </td><td>
                    '.$cline[$i][1].'
                 </td><td>
                     '.$cline[$i][2].'
                 </td><td>
                     '.$cline[$i][3].'
                 </td><td>
                     '.$cline[$i][4].'
                 </td><td>
                     '.$cline[$i][5].'
                 </td><td>
                     '.$cline[$i][6].'
                 </td><td>
                     <a class="uk-button uk-button-primary" href="admin.php?qq='.$cline[$i][0].'">Delete</a>
                 </td>
             </tr>
                  ';
              }
              if(isset($_GET['qq'])){
                  delete_values("users", "u_id=".$_GET['qq']);
                  echo '<meta http-equiv="refresh" content="0; URL=admin.php"><meta name="keywords" content="automatic redirection">';
              }
             ?>     
             <table class="uk-table"> 
                 <h1><b>MANAGE RESERVATION</b></h1> 
             <tr>
                 <td>
                     <b> Full Name</b>
                 </td><td>
                     <b> Reservation ID</b>
                 </td><td>
                     <b>Room Number</b>
                 </td><td>
                     <b>Room Type</b>
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
             <?php
             $cline2 = return_values2("users.u_fullname,reservation.r_id,reservation.r_rnum,reservation.r_rtype,reservation.r_pmethod,rooms.r_rate,reservation.r_arrivdate,reservation.r_deptdate,reservation.r_payment", "reservation LEFT JOIN rooms ON rooms.r_rtype = reservation.r_rtype LEFT JOIN users ON reservation.u_id = users.u_id ","WHERE reservation.r_id IS NOT NULL","");
             //echo '<p><b>TOTAL RESERVED ROOMS : '.sizeof($cline2).'</b></p>'; 
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
                      '.$cline2[$i][7].'
                 </td><td>
                      '.$cline2[$i][8].'
                 </td><td>
                     <a class="uk-button uk-button-primary" href="admin.php?d='.$cline2[$i][1].'&x='.$cline2[$i][3].'">Remove</a>
                 </td>
             </tr>
                  ';
              }
              if(isset($_GET['d'])){
                  delete_values("reservation", "r_id=".$_GET['d']);
                  update_values("`".$_GET['x']."`","u_id=NULL,rm_avail='Available',r_id=NULL","r_id=".$_GET['d']);
                  echo '<meta http-equiv="refresh" content="3; URL=admin.php"><meta name="keywords" content="automatic redirection">';
              }
              
             ?>
              
             
</body>
</html>