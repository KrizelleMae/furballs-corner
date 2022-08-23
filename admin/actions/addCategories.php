<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	
 
 
  // $categoriesImage 	= $_POST['categoriesImage'];
  $categoriesName 	= $_POST['categoriesName'];
  $categoriesStatus 	= $_POST['categoriesStatus'];
  $filename = $_FILES['categoriesImage']['name'];

  $ext = pathinfo($filename, PATHINFO_EXTENSION);
  $new_filename = uniqid(rand()).'.'.$ext;
	if(in_array($type, array('gif', 'jpg', 'jpeg', 'png', 'JPG', 'GIF', 'JPEG', 'PNG'))) {
		if(is_uploaded_file($_FILES['categoriesImage']['tmp_name'])) {			
			if(move_uploaded_file($_FILES['categoriesImage']['tmp_name'],'../assets/images/cat/' .$new_filename)) {
				
				$sql = "INSERT INTO categories (categories_name, categories_image, categories_active, categories_status) 
				VALUES ('$categoriesName', '$new_filename','$categoriesStatus', 1)";

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