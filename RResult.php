<?php
session_start();
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
         //     echo "connected to database";
                return $conn;
            }
        }else{
            echo "Database Closed <br/>";
            mysqli_close($conn);
        }
    }
        function return_values($select,$from,$where){
        $conn=connect_to_database('localhost','root','','pet_malu_hotel_reservation',true);
        $query="select ".$select." from `".$from."` where ".$where;
        //echo $query;
        $result = mysqli_query($conn,$query);
        
        if(!$result){
            die("Query Failed");
        }else {
            $cLine = array();
            //3. Use Returned Rows //
            $row = mysqli_fetch_assoc($result);
                $cLine [] = array($row['r_rate']);
               // print_r($row);
 
                  //4. Release Data From Result
            mysqli_free_result($result);
                 //5. Close Connection
          mysqli_close($conn);
           return $cLine;

    }
    }
       function return_values2($select,$from,$where){
        $conn2=connect_to_database('localhost','root','','pet_malu_hotel_reservation',true);
        $query2="select ".$select." from ".$from." where ".$where;
  //    echo $query2;
        $result2 = mysqli_query($conn2,$query2);
        if(!$result2){
            die("Query Failed");
        }else {
            $cLine2 = array();
            //3. Use Returned Rows //
            while($row2 = mysqli_fetch_assoc($result2)){
                       $cLine2 [] = array($row2['r_id']);
                   //    print_r($row2);            
            }
            //4. Release Data From Result
            mysqli_free_result($result2);
            //5. Close Connection
            mysqli_close($conn2);
            
            return $cLine2;
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
       // echo $query.'<br>';
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
        //Update
    function update_values($table,$set,$where){
        $query='update`'.$table.'` set '.$set.' where '.$where;
        $conn=connect_to_database('localhost','root','','pet_malu_hotel_reservation',true);
        $result = mysqli_query($conn,$query);
       // echo $query;
        mysqli_close($conn);
    }
    //Delete
    function delete_values($from,$where){
        $conn=connect_to_database('localhost','root','','pet_malu_hotel_reservation',true);
        $query='delete from '.$from.' where '.$where;
        mysqli_query($conn,$query);
        mysqli_close($conn);
        return true;
    }
    ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            if(isset($_POST['submit'])){
            //echo $_SESSION["type"]."<br>".$_POST['availrooms']."<br>".$_POST['nop']."<br>"."<br>".$_POST['arrival']."<br>".$_POST['departure']."<br>".$_POST['payment']."<br>";
            $type = $_SESSION["type"];
            $rm = $_POST['availrooms'];
            $nop = $_POST['nop'];
            $adate = $_POST['arrival'];
            $ddate = $_POST['departure'];
            $payment = $_POST['payment'];
            $ardate = date_create($adate);
            $dedate = date_create($ddate);
            $diff = date_diff($ardate,$dedate);
            $p = $diff->format("%a");
            $cline = return_values("r_rate","rooms","r_rtype = '".$_SESSION["type"]."'");
            for($i = 0; $i<sizeof($cline);$i++){
          //      echo $cline[$i][0];
            }
            $c = $cline[0][0];
            $nights = $p * $c;
            add_to("reservation", "u_id,r_rtype,r_rnum,r_nopersons,r_arrivdate,r_deptdate,r_pmethod,r_payment","'".$_SESSION['userid']."','".$type."','".$rm."','".$nop."','".$adate."','".$ddate."','" .$payment."','".$nights."'");
            $rid=return_values2("r_id","reservation","r_rnum='".$_POST['availrooms']."'");
           // echo $adate;
            //echo sizeof($rid);
            for($i = 0; $i<sizeof($rid);$i++){ 
                // echo $rid[$i][0];
                 $_SESSION["rid"] = $rid[$i][0];
           //     echo $_SESSION["rid"];
               update_values($_SESSION["type"],"u_id ='".$_SESSION['userid']."', rm_avail = 'NOT AVAILABLE',r_id=".$_SESSION["rid"]."","room_id = '".$rm."'");
                
                 
               }
          echo '<meta http-equiv="refresh" content="2; URL=userprofile.php"><meta name="keywords" content="automatic redirection">';
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
}
</style>

    </body>
</html>
