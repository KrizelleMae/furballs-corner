<?php 

session_start();

require_once 'db_connect.php';

// echo $_SESSION['userId'] FOR ADMIN;

if(!$_SESSION['userId']) {
	header('location: index.php');	
} 



?>