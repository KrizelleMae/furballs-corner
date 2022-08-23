<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	
 
	$productName 		= $_POST['productName'];
  // $productImage 	= $_POST['productImage'];
  $productDesc 		= $_POST['productDesc'];
  $quantity 			= $_POST['quantity'];
  $rate 					= $_POST['rate'];
  $categoryName 	= $_POST['categoryName'];
  $productStatus 	= $_POST['productStatus']; 
  $filename = $_FILES['productImage']['name']; 

	
	
	$ext = pathinfo($filename, PATHINFO_EXTENSION);
	$new_filename = uniqid(rand()).'.'.$ext;
	
	if(in_array($ext, array('gif', 'jpg', 'jpeg', 'png', 'JPG', 'GIF', 'JPEG', 'PNG'))) {
		if(is_uploaded_file($_FILES['productImage']['tmp_name'])) {			
			if(move_uploaded_file($_FILES['productImage']['tmp_name'],'../assets/images/stock/' .$new_filename)) {
				
				$sql = "INSERT INTO product (product_name, product_image, product_desc, categories_id, quantity, rate, active, status) 
				VALUES ('$productName', '$new_filename', '$productDesc', '$categoryName', '$quantity', '$rate', '$productStatus', 1)";

				if($connect->query($sql) === TRUE) {
					$valid['success'] = true;
					$valid['messages'] = "Successfully Added";	
				} else {
					$valid['success'] = false;
					$valid['messages'] = "Error while adding the members";
				}

			}	else {
				return false;
			}	// /else	
		} // if
	} // if in_array 		

	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST