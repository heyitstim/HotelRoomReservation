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
              $cLine [] = array($row['u_fullname'],$row['room_id'],$row['r_id'],$row['r_arrivdate'],$row['r_deptdate']);
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
                       $cLine2 [] = array($row2['u_fullname'],$row2['room_id'],$row2['r_id'],$row2['r_arrivdate'],$row2['r_deptdate']);
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
       // echo $query;
      //  mysqli_close($conn);
    }
    //Delete
    function delete_values($from,$where){
        $conn=connect_to_database('localhost','root','','pet_malu_hotel_reservation',true);
        $query='delete from '.$from.' where '.$where.';';
    //    echo $query;
        mysqli_query($conn,$query);
        mysqli_close($conn);
        return true;
    }
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="./styles/styles.css">
        <link rel="stylesheet" type="text/css" href="./styles/uikit.min.css">
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
                <li><a class="border" href="logout.php">LOG OUT</a></li>
            </ul>
        </nav>
    </div>

        
        <h2 ><b>Manage Rooms</b></h2>
        <h1><b>Single Rooms</b></h1>

        <style>
            
             tr {background-color: #f2f2f2;}
             body{ background-color: #576884;
                height: 1300px;
             }
                 h1 { color: #ffffb3; 
                     text-align: left;
                     
                     font-size: 20px;
                            font-family: Butterfly;
                     padding-left: 3%;       
                    }
                  h2 {
                    color: #ffffff;
                    text-align: center;
                    font-size:  40px;
                    font-family:  Butterfly;
                  }  
        </style>
            <table class="uk-table"> 
             <tr>
                 <td>
                     <b>Reserved User</b>
                 </td><td>
                     <b> Room Number</b>
                 </td><td>
                     <b> Reservation ID</b>
                 </td><td>
                     <b>Arrive Date</b>
                 </td><td>
                     <b>Departure Date</b>
                 </td><td>
                     <b>ACTIONS</b>
                 </td>
             </tr>
        <?php
             $cline = return_values("users.u_fullname,`Single`.room_id,reservation.r_id,reservation.r_arrivdate,reservation.r_deptdate","reservation LEFT JOIN `Single` ON `Single`.r_id = reservation.r_id LEFT JOIN users ON `Single`.u_id = users.u_id WHERE room_id = reservation.r_rnum");
             echo '<span class="uk-label">CURRENT RESERVE COUNT :'.sizeof($cline).'</span>';
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
                     <a class="uk-button uk-button-primary" href="managerooms.php?qq='.$cline[$i][2].'&x=`Single`">Delete</a>
                 </td>
             </tr>
                  ';
              }if(isset($_GET['d'])){
                  update_values($_GET['x'],"u_id=NULL,rm_avail='Available',r_id=NULL","r_id=".$_GET['d']);
                  delete_values("reservation", "r_id=".$_GET['d']);
                  echo '<meta http-equiv="refresh" content="2; URL=managerooms.php"><meta name="keywords" content="automatic redirection">';
              }
        
        ?>
             
            <table class="uk-table"> 
             <tr>
                 <td>
                     <b>Reserved User</b>
                 </td><td>
                     <b> Room Number</b>
                 </td><td>
                     <b> Reservation ID</b>
                 </td><td>
                     <b>Arrive Date</b>
                 </td><td>
                     <b>Departure Date</b>
                 </td><td>
                     <b>ACTIONS</b>
                 </td>
             </tr>
          <h1><b>Double Rooms</b></h1>
        <?php
             $cline = return_values("users.u_fullname,`Double`.room_id,reservation.r_id,reservation.r_arrivdate,reservation.r_deptdate","reservation LEFT JOIN `Double` ON `Double`.r_id = reservation.r_id LEFT JOIN users ON `Double`.u_id = users.u_id WHERE room_id = reservation.r_rnum");
             echo '<span class="uk-label">CURRENT RESERVE COUNT : '.sizeof($cline).'</span>';
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
                     <a class="uk-button uk-button-primary" href="managerooms.php?qq='.$cline[$i][2].'&x=`Double`">Delete</a>
                 </td>
             </tr>
                  ';
              }if(isset($_GET['d'])){
                  update_values($_GET['x'],"u_id=NULL,rm_avail='Available',r_id=NULL","r_id=".$_GET['d']);
                  delete_values("reservation", "r_id=".$_GET['d']);
                  echo '<meta http-equiv="refresh" content="2; URL=managerooms.php"><meta name="keywords" content="automatic redirection">';
              }
        
        ?>
            
            <table class="uk-table"> 
             <tr>
                 <td>
                     <b>Reserved User</b>
                 </td><td>
                     <b> Room Number</b>
                 </td><td>
                     <b> Reservation ID</b>
                 </td><td>
                     <b>Arrive Date</b>
                 </td><td>
                     <b>Departure Date</b>
                 </td><td>
                     <b>ACTIONS</b>
                 </td>
             </tr>
          <h1><b>Deluxe Rooms</b></h1>
        <?php
             $cline = return_values("users.u_fullname,`Deluxe`.room_id,reservation.r_id,reservation.r_arrivdate,reservation.r_deptdate","reservation LEFT JOIN `Deluxe` ON `Deluxe`.r_id = reservation.r_id LEFT JOIN users ON `Deluxe`.u_id = users.u_id WHERE room_id = reservation.r_rnum");
             echo'<span class="uk-label">CURRENT RESERVE COUNT : '.sizeof($cline).'</span>';
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
                     <a class="uk-button uk-button-primary" href="managerooms.php?qq='.$cline[$i][2].'&x=`Deluxe`">Delete</a>
                 </td>
             </tr>
                  ';
              }if(isset($_GET['d'])){
                  update_values($_GET['x'],"u_id=NULL,rm_avail='Available',r_id=NULL","r_id=".$_GET['d']);
                  delete_values("reservation", "r_id=".$_GET['d']);
                  echo '<meta http-equiv="refresh" content="2; URL=managerooms.php"><meta name="keywords" content="automatic redirection">';
              }
        
        ?>
            
            <table class="uk-table"> 
             <tr>
                 <td>
                     <b>Reserved User</b>
                 </td><td>
                     <b> Room Number</b>
                 </td><td>
                     <b> Reservation ID</b>
                 </td><td>
                     <b>Arrive Date</b>
                 </td><td>
                     <b>Departure Date</b>
                 </td><td>
                     <b>ACTIONS</b>
                 </td>
             </tr>
          <h1><b>Premier Rooms</b></h1>
        <?php
             $cline = return_values("users.u_fullname,`Premier`.room_id,reservation.r_id,reservation.r_arrivdate,reservation.r_deptdate","reservation LEFT JOIN `Premier` ON `Premier`.r_id = reservation.r_id LEFT JOIN users ON `Premier`.u_id = users.u_id WHERE room_id = reservation.r_rnum");
             echo '<span class="uk-label">CURRENT RESERVE COUNT : '.sizeof($cline).'</span>';
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
                     <a class="uk-button uk-button-primary" href="managerooms.php?qq='.$cline[$i][2].'&x=`Premier`">Delete</a>
                 </td>
             </tr>
                  ';
              }if(isset($_GET['d'])){
                  update_values("`".$_GET['x']."`","u_id=NULL,rm_avail='Available',r_id=NULL","r_id=".$_GET['d']);
                  delete_values("reservation", "r_id=".$_GET['d']);
                 // echo '<meta http-equiv="refresh" content="1; URL=managerooms.php"><meta name="keywords" content="automatic redirection">';
              }
        
        ?>
    </body>
</html>
