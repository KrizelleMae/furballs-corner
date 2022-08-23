<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	
  $categoriesId     = $_POST['editCategoriesId'];
  $categoriesName   = $_POST['editCategoriesName'];
  $categoriesStatus = $_POST['editCategoriesStatus']; 
  

  $sql = "UPDATE categories SET categories_name = '$categoriesName', categories_active = '$categoriesStatus', categories_status = 1 WHERE categories_id = $categoriesId ";

	if($connect->query($sql) === TRUE) {
	 	$valid['success'] = true;
		$valid['messages'] = "Successfully Updated";	
	} else {
	 	$valid['success'] = false;
	 	$valid['messages'] = "Error while updating the categories";
	}
	 
	$connect->close();

	echo json_encode($valid);
 
} 