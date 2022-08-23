<?php 	

require_once 'core.php';
//VULNERABLE IN SQL INJECTION
$sql = "SELECT categories_id, categories_name FROM categories WHERE status = 1 AND active = 1";
$result = $connect->query($sql);

$data = $result->fetch_all();

$connect->close();

echo json_encode($data);