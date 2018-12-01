 <?php
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
    function add_to($table,$columns,$values){
        
        $conn=connect_to_database('localhost:3306','root','','pet_malu_hotel_reservation',true);
        $query='insert into '.$table.' ';
        $query.='('.$columns.') ';
        $query.='values ';
        $query.='('.$values.')';
      //  echo $query.'<br>';
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
        echo $query;
        mysqli_close($conn);
    }
 ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Form Processing</title>
        
    </head>
    <body>
        <?php
        if(isset($_POST["u_pass"])&&isset($_POST["u_name"])&&isset($_POST["u_fname"])){
        $u_name = $_POST["u_name"];
        $u_passval = $_POST["u_pass1"];
        $u_pass = $_POST["u_pass"];
        $u_fname = $_POST["u_fname"];
        $u_email = $_POST["u_email"];
        $u_tel = $_POST["u_telno"];
        $u_addr  = $_POST["u_addr"];
        if(duplicates($u_name) == false){
            echo '<h1>Username Available</h1>';
                if($u_passval != $u_pass){
            echo "<h2>Password Dont Match</h2><br>Please Retry";   
            echo '<meta http-equiv="refresh" content="3; URL=editprofile.php"><meta name="keywords" content="automatic redirection">';
           //echo $u_email;
                }else{
              update_values("users","'u_fullname='".$u_fname."'','u_name='".$u_name."'','u_pass='".$u_pass."'','u_addr='".$u_addr."'','u_email='".$u_email."'','u_tel='".$u_tel."''","u_id =".$_GET['sid']);
              echo '<p style="text-align : center">Update Success<br>Returning you to your profile.</p>';
              echo '<meta http-equiv="refresh" content="3'
              . '; URL=userprofile.php"><meta name="keywords" content="automatic redirection">';
        }
        }else{
            echo '<h1>Username Exists</h1>';
            echo '<meta http-equiv="refresh" content="3; URL=userprofile.php"><meta name="keywords" content="automatic redirection">';
        }

	}
        ?>

        <IMG SRC="./images/load.gif">


<style >
    body, html{

    background-color:#34515E;
    font-family: 'Butterfly', sans-serif;
    font-size: 18px;
    text-align: center;
    color: #ffffff;

}
img {
    padding-top: 10%;
    align-content: center;
    size: 15px;
}
</style>
    </body>
</html>
