<?php

$dbhost ="localhost";
$dbuser ="root";
$dbpass ="";
$dbname ="furrshop";

if (!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

    die("Failed to connect: " . mysqli_connect_error());
}