<?php 	

require_once 'core.php';

$categoriesId = $_GET['i'];

$sql = "SELECT categories_image FROM categories WHERE categories_id = {$categoriesId}";
$data = $connect->query($sql);
$result = $data->fetch_row();

$connect->close();
 
echo "assets/images/cat/" . $result[0]; //fecth in th cat file