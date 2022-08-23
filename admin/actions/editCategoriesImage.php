<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {		

$categoriesId = $_POST['categoriesId'];
$filename = $_FILES['editCategoriesImage']['name'];    


	$type = pathinfo($filename, PATHINFO_EXTENSION);	
	$link = uniqid(rand()).'.'.$type;
	if(in_array($type, array('gif', 'jpg', 'jpeg', 'png', 'JPG', 'GIF', 'JPEG', 'PNG'))) {
		if(is_uploaded_file($_FILES['editCategoriesImage']['tmp_name'])) {			
			if(move_uploaded_file($_FILES['editCategoriesImage']['tmp_name'],'../assets/images/cat/' .$link)) {

				$sql = "UPDATE categories SET categories_image = '$link' WHERE categories_id = $categoriesId";				

				if($connect->query($sql) === TRUE) {									
					$valid['success'] = true;
					$valid['messages'] = "Successfully Updated";	
				} else {
					$valid['success'] = false;
					$valid['messages'] = "Error while updating categories image";
				}
			}	else {
				return false;
			}	// /else	
		} // if
	} // if in_array 		
	 
	$connect->close();

	echo json_encode($valid);
 
} // /end of $_POST