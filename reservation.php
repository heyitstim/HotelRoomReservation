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
        function return_values($select,$from,$where){
        $conn=connect_to_database('localhost','root','','pet_malu_hotel_reservation',true);
        $query="select ".$select." from `".$from."` where ".$where;
       // echo $query;
        $result = mysqli_query($conn,$query);
        
        if(!$result){
            die("Query Failed");
        }else {
            $cLine = array();
            //3. Use Returned Rows //
            while($row = mysqli_fetch_assoc($result)){
                $cLine [] = array($row['room_id']);
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


<script src="./scripts/reserve.js"></script>
<link rel="stylesheet" type="text/css" href="./styles/styles.css">


  <body>

  <div id="banner" class="site-header col-12">
    
    <h3>PET MALU HOTEL<br/>
      <span>a world of unparalleled comfort and convenience</span>
    </h3>
  </div>

    <div class="diamond"></div>
    <div class="form-wrap">
      <?php
   //   echo'userid='.$_SESSION["userid"].'';
      ?>
      <form method = "get">
        <div class="location">
          <label for="location"><b>LOCATION </b></label><br/>
          <input type="text" name="location" placeholder="Davao City Philippines"<?php echo 'value="'.$_GET["location"].'"';?> ><br/>
        </div>

        <div class="form-group">
                 <label>Room/Suite Type</label>
              <div class="">
                  <input type="radio" name="type" value="Single"<?php if($_GET["type"]=='Single'){echo 'checked';}?>>Single<br>
                  <input type="radio" name="type" value="Double"<?php if($_GET["type"]=='Double'){echo 'checked';}?>>Double<br>
          <input type="radio" name="type" value="Premier"<?php if($_GET["type"]=='Premier'){echo 'checked';}?>>Premier<br>
          <input type="radio" name="type" value="Deluxe"<?php if($_GET["type"]=='Deluxe'){echo 'checked';}?>>Deluxe<br>
         </div>
              </div>
          <input type="submit" value="Check Available Rooms" name="submitquery">
        </form>  
        <form action="RResult.php" method="post">
             <div class="form-group">
                 <label>List of Available Rooms</label>
                   <?php
                   if(isset($_GET["type"])){
                   //echo $_GET["location"];
                   //echo $_GET["type"];
                    $valuess = return_values("room_id",$_GET["type"],"rm_avail = 'Available'");
                   // echo sizeof($valuess);
                   if(sizeof($valuess) == 0){
                   echo '<p> NO AVAILABLE ROOMS!</p>';
                   }else{
                   echo "<select name='availrooms'>";
                   for($i = 0; $i<sizeof($valuess);$i++){
                   echo "<option value='".$valuess[$i][0]."'>".$valuess[$i][0]."</option>";    
              
                   }
                   echo "</select>";
                   }}
                   $_SESSION["type"] = $_GET["type"];
                    ?>
             </div>
            
             <div class="form-group">
                 <label>Number of persons</label>
                 <select name="nop" class="form-control" id="person_number" onchange="finalCost()">
                     <option value="0"> 0 </option>
                     <option value="1"> 1 </option> 
                     <option value="2"> 2 </option>
                     <option value="3"> 3 </option>
                     <option value="4"> 4 </option>
                     <option value="5"> 5 </option>
                     <option value="6"> 6 </option>
                     <option value="7"> 7 </option>
                 </select>
             </div>
          <div class="dates">
          <div class="arrival">
            <label for="arrival"><b>ARRIVAL</b></label><br/>
            <input name="arrival" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" placeholder="10/03/2016"/>
          </div>
          <div class="departure">
            <label for="arrival"><b>DEPARTURE</b></label><br/>
            <input name="departure" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" placeholder="05/11/2016"/>
          </div>
        </div>
              <div class="">
          <input type="radio" name="payment" value="creditcard">Credit Card <br>
          <input type="radio" name="payment" value="walkin">Walk-In<br>
          </div>
          <input type ="submit" value="submit" name = "submit">
      </form>
      
      <div class="linkbox">
        <div class="links">
          <div class="origin">
       
          </div>
          <div class="me">

          </div>
        </div>
      </div>
  </body>
</html>
<style type="text/css">
  
  
* {
  box-sizing: border-box;
}

body {
  background: #576884;
  color: #888;
  font: 'Open Sans';
  font-size: 100%;
  overflow: hidden;
}
@media (max-width: 450px) {
  body {
    background: #EBF3F5;
    overflow: scroll;
  }
}


.location {
  align-content: left;
}

.diamond {
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%) rotate(-45deg);
          transform: translate(-50%, -50%) rotate(-45deg);
  height: 550px;
  width: 550px;
  background: #EBF3F5;
  border-radius: 8px;
  box-shadow: 0px 0px 20px 3px rgba(17, 17, 17, 0.2);
  -webkit-transition: all .5s ease-in-out;
  transition: all .5s ease-in-out;
}
@media (max-width: 450px) {
  .diamond {
    display: none;
  }
}

@media (max-width: 450px) {
  .mob {
    display: inline-block;
  }
}

.form-wrap {
  position: absolute;
  text-align: center;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
  
}
@media (max-width: 450px) {
  .form-wrap {
    width: 80%;
  }
}
.form-wrap form {
  margin-bottom: 10px;
}


</style>
