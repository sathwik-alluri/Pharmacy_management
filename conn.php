<?php
//include("listDBconn.php");

 
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "pharmacy";

  
 // Create connection
 $con = mysqli_connect($servername, $username, $password, $dbname);
  if($con)
 {
    echo "Connected successfully";
 }  
  
    
?>