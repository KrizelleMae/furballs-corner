<?php
include('connect.php');
$user_id = $_GET['id'];

if(isset($_POST['edit']))
{
	$firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $address = $_POST['address'];
    $phonenumber = $_POST['phonenumber'];
    

	$update = "UPDATE users SET firstname='$firstname', lastname='$lastname',  address='$address', phonenumber = '$phonenumber' WHERE user_id=$user_id ";
	$run_update = mysqli_query($con,$update);

	if($run_update){
		header('location:account.php');
	}else{
		echo "Failed to Save Changes";
	}
}
 
?>