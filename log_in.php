<?php
session_start();
?>

<?php
    $conn=null;
    function connect_to_database($host_name,$user_name,$pass,$db_name,$open_db){
        $conn = mysqli_connect($host_name,$user_name,$pass,$db_name);
        if($open_db==true){
            
            if(mysqli_errno($conn)){
                die("Could not connnect to database. <br/>");
            }else{
               //echo "connected to database";
                return $conn;
            }
        }else{
            echo "Database Closed <br/>";
            mysqli_close($conn);
        }
    }
    //R = Return a query
    function return_values($select,$from,$where,$table_number){
        $conn=connect_to_database('localhost','root','','pet_malu_hotel_reservation',true);
        $query="select ".$select." from ".$from." ".$where;
        $result = mysqli_query($conn,$query);
        if(!$result){
            die("Query Failed");
        }else {
            $cLine = array();
            //3. Use Returned Rows //
            while($row = mysqli_fetch_assoc($result)){
                switch($table_number){
                    // Users Table
                   case 1:{
                       $cLine [] = array($row['u_id'],$row['u_fullname'],$row['u_name'],$row['u_pass'],$row['u_addr'],$row['u_email'],$row['u_tel']);
                       break; 
                   }
                }
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
<title>Log-in Page</title>

    <head>
        <meta charset = "utf-8">
        <title>Homepage</title>
        <link rel = "stylesheet" href = "./styles/style1.css">
        <link rel="stylesheet" type="text/css" href="./styles/styles.css">

        <script language="javascript" type="text/javascript">
  function fun_val()
    {
        var l=document.loginsell.username.value;
        if(l=="")
        {
            alert("Please Enter User name");
            document.loginsell.username.focus;
            return false;
        }

        var p=document.loginsell.password.value;
        if(p=="")
        {
            alert("Please Enter Password");
            document.loginsell.password.focus;
            return false;
        }
    }
  </script>

    </head>
    <body>
        <div id="header-container">
                <div id= "title-noemi" class="title"> Hotel Online Booking     </div>

    <div id="banner" class="site-header col-12">
        
        <h3>PET MALU HOTEL<br/>
            <span>a world of unparalleled comfort and convenience</span>
        </h3>
        <nav class="main-nav">
            <ul>
                <li><a class="border" href="index.php#">HOME</a></li>
                <li><a class="border" href="index.php#about">ABOUT US</a></li>
                <li><a class="border" href="index.php#port">GALLERY</a></li>
                <li><a class="border" href="index.php#exp">ROOM TYPES</a></li>
                <li><a class="border" href="index.php#contact">CONTACT US</a></li>
                <li><a class="border" href="log_in.php">LOG IN</a></li>
            </ul>
        </nav>
    </div>


        <div class = "loginBox">
        <div class = "glass">
        <img src = "image.png" class = "user">
        <h3>Sign in Here</h3>
        <form action = "log_in.php" method="post">
            <div class = "inputBox">
            <input type = "text" name = "u_name" placeholder= "Username">
            <span><i class = "fa fa-user" aria-hidden = "true"></i></span>
            </div>

             <div class = "inputBox">
            <input type = "password" name = "u_pass" placeholder= "Password">
            <span><i class = "fa fa-password" aria-hidden = "true"></i></span>
            </div>
                <input type = "submit" name = "submit" value = "Log-in" onClick="return fun_val();"> 
        </form>
               <?php
        if(isset($_POST['submit'])){
            $u_name = $_POST['u_name'];
            $u_pass = $_POST['u_pass'];
            $cLine = return_values("*", "users", "where u_name = '".$u_name."'", 1);
            if(strlen($u_name)<1||strlen($u_pass)<1){
                echo '<a>Check Username or Password</a>'; 
            }else if(sizeof($cLine)<1){
                echo '<a>Username is not available</a>'; 
            }else if(sizeof($cLine)>0){
                if($cLine[0][2] == $u_name && $cLine[0][3] == $u_pass){
                    if($u_name == 'admin'){
                        $_SESSION ['userid'] = $cLine[0][0];
                       echo '<meta http-equiv="refresh" content="0; URL=admin.php"><meta name="keywords" content="automatic redirection">'; 
                    }else{
                        $_SESSION ['userid'] = $cLine[0][0];
                        echo '<meta http-equiv="refresh" content="0; URL=userprofile.php"><meta name="keywords" content="automatic redirection">';
                    } 
                }else{
                   echo '<a>Incorrect Password!'."<br>"; 
                }

            }
                                   
            } 
        ?>
        <a href = "userinfo.php">New User?</a>

        </div>
        </div>
    </body>
</html>        