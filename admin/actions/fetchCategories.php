<?php 	

require_once 'core.php';

$sql = "SELECT categories.categories_id, categories.categories_name, categories.categories_image, categories.categories_active, categories.categories_status FROM categories WHERE categories.categories_status = 1";
$result = $connect->query($sql);

$output = array('data' => array());

if($result->num_rows > 0) { 

 // $row = $result->fetch_array();
 $activeCategories = ""; 

 while($row = $result->fetch_array()) {
 	$categoriesId = $row[0];
 	// active 
 	if($row[3] == 1) {
 		// activate member
 		$activeCategories = "<label class='label label-success'>Available</label>";
 	} else {
 		// deactivate member
 		$activeCategories = "<label class='label label-danger'>Not Available</label>";
 	}

 	$button = '<!-- Single button -->
	<div class="btn-group">
	  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Action <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu">
	    <li><a type="button" data-toggle="modal" id="editCategoriesModalBtn" data-target="#editCategoriesModal" onclick="editCategories('.$categoriesId.')"> <i class="glyphicon glyphicon-edit"></i> Edit</a></li>
	    <li><a type="button" data-toggle="modal" data-target="#removeCategoriesModal" id="removeCategoriesModalBtn" onclick="removeCategories('.$categoriesId.')"> <i class="glyphicon glyphicon-trash"></i> Remove</a></li>       
	  </ul>
	</div>';
	$imageUrl = substr($row[2], 3);
	$categoriesImage = "<img class='img-round' src='assets/images/cat/".$row['categories_image']."' style='height:50px; width:50px;'  />";

 	$output['data'][] = array( 	
		// image
		$categoriesImage, 	
 		$row[1], 		
 		$activeCategories,
 		$button 		
 		); 	
 } // /while 

}// nd of if num_rows

$connect->close();

echo json_encode($output);