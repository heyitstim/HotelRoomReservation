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
function RePasswordValidataion(sPassword,sRePassword)
{
	if(sPassword.toString()!=sRePassword.toString())
	{
		alert("Re-Type Password Has to be same as the Password");
		return false;
	}
	else{return true;}
}
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
		<nav class="main-nav">
			<ul>
				
				<li><a class="border" href="index.php#contact">CONTACT US</a></li>
				<li><a class="border" href="log_in.php">LOG IN</a></li>
			</ul>
		</nav>
	</div>
</div>


<div class="container-fluid">
	 <form action="registration_processing.php" method="post" class="register-form"> 
      <div class="row">      
           <div class="col-md-4 col-sm-4 col-lg-4">
              <label for="firstName">USERNAME<br></label>
               <input name="u_name" class="form-control" type="text">    
           </div>            
      </div>

      <div class="row">
           <div class="col-md-4 col-sm-4 col-lg-4">
              <label for="password">PASSWORD<br></label>
               <input name="u_pass" class="form-control" type="password">             
           </div>            
      </div>

      <div class="row">
           <div class="col-md-4 col-sm-4 col-lg-4">
              <label for="password">RE-ENTER <br></label>
               <input name="u_pass1" class="form-control" type="password" onchange="return RePasswordValidataion(document.userinfo.u_pass.value,document.userinfo.u_pass1.value)">             
           </div>            
      </div>

      <div class="row">      
           <div class="col-md-4 col-sm-4 col-lg-4">
              <label for="firstName">FULLNAME<br></label>
               <input name="u_fname" class="form-control" type="text" size="50">    
           </div>            
      </div>

      <div class="row">
           <div class="col-md-4 col-sm-4 col-lg-4">
              <label for="email">EMAIL<br></label>
               <input name="u_email" class="form-control" type="email" size="50">             
           </div>            
      </div>

      <div class="row">
           <div class="col-md-4 col-sm-4 col-lg-4">
              <label for="email">TELEPHONE<br></label>
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
</div>
</form>
</body>
</html>