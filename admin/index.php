<?php 
require_once 'actions/db_connect.php';

session_start();

// if(isset($_SESSION['userId'])) {
// 	header('location: dashboard.php');	
// }

$errors = array();

if($_POST) {		

	$email = $_POST['email'];
	$password = $_POST['password'];

	if(empty($email) || empty($password)) {
		if($email == "") {
			$errors[] = "Email is required";
		} 

		if($password == "") {
			$errors[] = "Password is required";
		}
	} else {
		$sql = "SELECT * FROM users WHERE email = '$email'";
		$result = $connect->query($sql);

		if($result->num_rows == 1) {
			$password = md5($password);
			// exists
			$mainSql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
			$mainResult = $connect->query($mainSql);

			if($mainResult->num_rows == 1) {
				$value = $mainResult->fetch_assoc();
				$user_id = $value['user_id'];

				// set session
				$_SESSION['userId'] = $user_id;

				header('location:dashboard.php');	
			} else{
				
				$errors[] = "Incorrect username/password combination";
			}//end of else
		} else {		
			$errors[] = "email does not exists";		
		}//end of else
	}//end of else not empty usernameend of / password
	
}//end of if $_POST
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8"end of >
     <!--logo-->
     <link rel="shortcut icon" href="assets/fclogo.png"/>
     
     <meta name="viewport" content="width=device-width,user-scalable=no"/>
   
    <title>Furballs Corner Admin Login </title>

 
    <!--Main CSS File -->
    <link type="text/css" rel="stylesheet" href="assets/css/login.css">
    <link type="text/css" rel="stylesheet" href="assets/css/style.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css"end of >
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <!-----------JSLOADER------------------>
    <script src="js/scr.js"></script>

	
	<!-- font awesome -->
	<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">

  <!-- custom css -->
  <link rel="stylesheet" href="custom/css/custom.css">	

  <!-- jquery -->
	<script src="assets/jquery/jquery.min.js"></script>
  <!-- jquery ui -->  
  <link rel="stylesheet" href="assests/jquery-ui/jquery-ui.min.css">
  <script src="assets/jquery-ui/jquery-ui.min.js"></script>

  <!-- bootstrap js -->
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	
  </head>
  <body>

<div class="messages" >
							<?php if($errors) {
								foreach ($errors as $key => $value) {
									echo '<div style=" top:0;
									width: 100%;
									text-align: center;  
									justify-content: center;
									align-items: center;
									height: 2.5rem;
									padding-top:10px ;
									background-color:tomato;
									"class="alert alert-warning" role="alert">
									<i class="glyphicon glyphicon-exclamation-sign"></i>
									'.$value.'</div>';										
									}
								} ?>
</div>
<form id="form-input" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    <fieldset>
      <h2 class="form-title">Admin Login</h2>
      <h3 class="form-subtitle">login using your admin account</h3>
      <input type="email" class="form-control" id="email" name="email" placeholder="Email" autocomplete="off"end of >
	  <input type="password" class="form-control" id="password" name="password" placeholder="Password" autocomplete="off"end of >
	  <button type="submit" class="logintbn action-button"> <i class="glyphicon glyphicon-log-in"></i> Login</button>
  
    </fieldset>
</form>

</body>
</html>







	