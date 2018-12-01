<?php
session_start();
?> 
<?php
        function return_values2($select,$from,$where){
        $conn=connect_to_database('localhost','root','','pet_malu_hotel_reservation',true);
        $query2="select ".$select." from ".$from." where ".$where;
        //echo $query2;
        $result2 = mysqli_query($conn,$query2);
        if(!$result2){
            die("Query Failed");
        }else {
            $cLine2 = array();
            //3. Use Returned Rows //
            while($row2 = mysqli_fetch_assoc($result2)){
                       $cLine2 [] = array($row2['u_name']);     
            }
            //4. Release Data From Result
            mysqli_free_result($result2);
            //5. Close Connection
           mysqli_close($conn);
            
            return $cLine2;
        }

    }
    //Crud Operation
    // C = add
    function duplicates($u){
        $cline = return_values2("*", "users", "u_name='".$u."'");
        if(sizeof($cline)<1){
            return false;
        }else{
           return true;
        }
    }
        //Update
    function update_values($table,$set,$where){
        $query='update '.$table.' set '.$set.' where '.$where;
        $conn=connect_to_database('localhost','root','','pet_malu_hotel_reservation',true);
        $result = mysqli_query($conn,$query);
    //    echo $query;
        mysqli_close($conn);
    }
 ?>
<?php
     connect_to_database('localhost','root','','pet_malu_hotel_reservation',true);
    //Connect to Database//
    $conn=null;
    function connect_to_database($host_name,$user_name,$pass,$db_name,$open_db){
        $conn = mysqli_connect($host_name,$user_name,$pass,$db_name);
        if($open_db==true){
            
            if(mysqli_errno($conn)){
                die("Could not connnect to database. <br/>");
            }else{
              //  echo "connected to database";
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
        
        $conn=connect_to_database('localhost','root','','pet_malu_hotel_reservation',true);
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
    
?>
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="./styles/styles.css">
<link rel="stylesheet" type="text/css" href="./styles/newuser.css">
<title>registration form</title>
<script language="JavaScript">
</script>
<style >
	body, html{
    background-color:#34515E;
   font-family: 'Open Sans Condensed', sans-serif;
    font-size: 18px;

}
</style>
	


	<button onclick="goToTop()" id="top" title="Go to top"><img src="./images/arrow.png"></button>

	<div id="header-container">
				<div id= "title-noemi" class="title"> Hotel Online Booking     </div>

	<div id="banner" class="site-header col-12">
		
		<h3>PET MALU HOTEL<br/>
			<span>a world of unparalleled comfort and convenience</span>
		</h3>
		
	</div>
</div>


<div class="container-fluid">
    <form action="editprofile.php" method="post" class="register-form"> 
      <div class="row">      
           <div class="col-md-4 col-sm-4 col-lg-4">
              <label for="firstName">USERNAME*<br></label>
               <input name="u_name" class="form-control" type="text">    
           </div>            
      </div>

      <div class="row">
           <div class="col-md-4 col-sm-4 col-lg-4">
              <label for="password">PASSWORD*<br></label>
               <input name="u_pass" class="form-control" type="password">             
           </div>            
      </div>

      <div class="row">
           <div class="col-md-4 col-sm-4 col-lg-4">
              <label for="password">RE-ENTER*<br></label>
               <input name="u_pass1" class="form-control" type="password" onchange="return RePasswordValidataion(document.userinfo.u_pass.value,document.userinfo.u_pass1.value)">             
           </div>            
      </div>

      <div class="row">      
           <div class="col-md-4 col-sm-4 col-lg-4">
              <label for="firstName">FULLNAME*<br></label>
               <input name="u_fname" class="form-control" type="text" size="50">    
           </div>            
      </div>

      <div class="row">
           <div class="col-md-4 col-sm-4 col-lg-4">
              <label for="email">EMAIL*<br></label>
               <input name="u_email" class="form-control" type="email" size="50">             
           </div>            
      </div>

      <div class="row">
           <div class="col-md-4 col-sm-4 col-lg-4">
              <label for="email">TELEPHONE*<br></label>
               <input name="u_telno" class="form-control" type="text" size="50">             
           </div>            
      </div>

      <div class="row">
           <div class="col-md-4 col-sm-4 col-lg-4">
              <label for="email">ADDRESS<br></label>
               <input name="u_addr" class="form-control" type="text" size="50">             
           </div>            
      </div>
	<div align="center"><input class="button" type="submit" value="Submit" name="ok" align="right" />
                    <?php
        if(isset($_POST["u_pass"])&&isset($_POST["u_name"])&&isset($_POST["u_fname"])){
        $u_name = $_POST["u_name"];
        $u_passval = $_POST["u_pass1"];
        $u_pass = $_POST["u_pass"];
        $u_fname = $_POST["u_fname"];
        $u_email = $_POST["u_email"];
        $u_tel = $_POST["u_telno"];
        $u_addr  = $_POST["u_addr"];
        if(strlen($u_name)<1||strlen($u_pass)<1||strlen($u_fname)<1||strlen($u_tel)<1){
             echo '<a style="color:white;"><br>Please Input the Required Fields</a>'; 
             echo '<meta http-equiv="refresh" content="3; URL=editprofile.php?sid='.$_SESSION["userid"].'><meta name="keywords" content="automatic redirection">';
        }else if(duplicates($u_name) == false){
            echo '<a style="color:white;"><br><b>Username Available<b></a>';
            if($u_passval != $u_pass){
            echo '<a stlye="color:white;"><br>Password dont match</a><br>';   
            echo '<meta http-equiv="refresh" content="3; URL=editprofile.php?sid='.$_SESSION["userid"].'><meta name="keywords" content="automatic redirection">';
           //echo $u_email;
                }else{
              update_values("users","u_fullname='".$u_fname."',u_name='".$u_name."',u_pass='".$u_pass."',u_addr='".$u_addr."',u_email='".$u_email."',u_tel='".$u_tel."'","u_id=".$_SESSION["userid"]);
              echo '<a style="color:white;"><br>Update Success<br>Returning you to your profile.</a>';
              echo '<meta http-equiv="refresh" content="3'
             . '; URL=userprofile.php"><meta name="keywords" content="automatic redirection">';
        }
        }else{
            echo '<a stlye="color:white;"><br>Username Exists</a>';
            echo '<meta http-equiv="refresh" content="3; URL=userprofile.php"><meta name="keywords" content="automatic redirection">';
        }

	}
        ?>

</div>
</form>
</body>
</html>
