<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {		

$productId = $_POST['productId'];
 

$filename = $_FILES['editProductImage']['name']; 


    $type = pathinfo($filename, PATHINFO_EXTENSION);	
	$url = uniqid(rand()).'.'.$type;
	
	if(in_array($type, array('gif', 'jpg', 'jpeg', 'png', 'JPG', 'GIF', 'JPEG', 'PNG'))) {
		if(is_uploaded_file($_FILES['editProductImage']['tmp_name'])) {			
			if(move_uploaded_file($_FILES['editProductImage']['tmp_name'],'../assets/images/stock/' .$url)) {

				$sql = "UPDATE product SET product_image = '$url' WHERE product_id = $productId";				

				if($connect->query($sql) === TRUE) {									
					$valid['success'] = true;
					$valid['messages'] = "Successfully Updated";	
				} else {
					$valid['success'] = false;
					$valid['messages'] = "Error while updating product image";
				}
			}	else {
				return false;
			}	// /else	
		} // if
	} // if in_array 		
	 
	$connect->close();

	echo json_encode($valid);
 
} // /end of $_POST