<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {
	$productId = $_POST['productId'];
	$productName 		= $_POST['editProductName']; 
	$productDesc		= $_POST['editProductDesc'];
 	$quantity 			= $_POST['editQuantity'];
  	$rate 				= $_POST['editRate'];
  	$categoryName 	    = $_POST['editCategoryName'];
  	$productStatus 	    = $_POST['editProductStatus'];

				
	$sql = "UPDATE product SET product_name = '$productName', product_desc = '$productDesc', categories_id = '$categoryName', quantity = '$quantity', rate = '$rate', active = '$productStatus', status = 1 WHERE product_id = $productId ";

	if($connect->query($sql) === TRUE) {
		$valid['success'] = true;
		$valid['messages'] = "Successfully Update";	
	} else {
		$valid['success'] = false;
		$valid['messages'] = "Error while updating product info";
	}

} // end of $_POST
	 
$connect->close(); 

echo json_encode($valid);
 
