<?php
    //Connect to Database//
    $conn=null;
    function connect_to_database($host_name,$user_name,$pass,$db_name,$open_db){
        $conn = mysqli_connect($host_name,$user_name,$pass,$db_name);
        if($open_db==true){
            
            if(mysqli_errno($conn)){
                die("Could not connnect to database. <br/>");
            }else{
                echo "connected to database";
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
        $query='delete from '.$from.' where '.$where;
        mysqli_query($conn,$query);
        mysqli_close($conn);
        return true;
    }
?>