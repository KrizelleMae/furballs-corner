<?php 	


header("Access-Control-Allow-Origin: *");
 
$localhost = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "furrshop";

// db connection
//NEED TO REFRACT THE CODE THIS IS VULNRABLE IN TERMS OF SECURITY IF MAY TIME
$connect = new mysqli($localhost, $username, $password, $dbname);
// check connection
if($connect->connect_error) {
  die("Connection Failed : " . $connect->connect_error);
} else {
  // echo "Successfully connected";
}

?>