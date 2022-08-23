<?php
session_start(); 
?>
<?php
  if(isset($_SESSION['user_id'])){
    header('location: index.php');
  }
?>
<?php
include("connect.php");
include("functions.php");
if(isset($_POST['email']))
{
   
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(!empty($email) && !empty($password) && !is_numeric($email))
    {
        
        $query = "select * from customer where email = '$email' limit 1";
        $result = mysqli_query($con,$query);

        if($result)
        {
            if($result && mysqli_num_rows($result) > 0)
            {
                
                $data = $result->fetch_array();
		    if (password_verify($password, $data['password']))
                {

                    $_SESSION['user_id'] = $data['user_id'];
                    header("Location: index.php");
                    die;
                }
            }
        }
        
        echo '<div class="error"><p>Email or Password is incorrect<p><div>';
    }else
    {
        echo '<div class="error"><p>Please enter some valid information!<p><div>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
     <!--logo-->
     <link rel="shortcut icon" href="assets/fclogo.png"/>
     
     <meta name="viewport" content="width=device-width,user-scalable=no"/>
     <meta
      name="description"
      content="Buy,Shop,Browse and Order Pet Products"
    />
    <meta
      name="keywords"
      content="Pet products, Dog Products, Furballs Corner, Furr Parent, Pet accessories, Pet Clothes, Pet Shop"
    />
   
    <title>Furballs Corner | Login </title>


    <!--Main CSS File -->
    <link type="text/css" rel="stylesheet" href="css/main.css"/>
    <link type="text/css" rel="stylesheet" href="css/logandreg.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <!-----------JSLOADER------------------>
    <script src="js/main.js"></script>
  </head>
  <body>

<div class="loader">
    <img src="assets/dualball.gif" alt="Loading..." />
</div>
<form id="form-input" name="login" action="login.php" method="post">
    <fieldset>
      <h2 class="form-title">Login</h2>
      <h3 class="form-subtitle">login to your account</h3>
      <input type="email" name="email" placeholder="Email" />
      <input type="password" minlength="6" name="password" placeholder="Password" />
      <div class="reset"><a href="recovery.php">Reset Password</a></div>
      <input type="submit" name="login" class="logintbn action-button" value="Login" />
      <div class="connect">
        <p>or connect with</p>
      </div>
      <div class="social-links">
        <button class="google-btn">Google Account</button>
      </div>
      <div class="linking">
        <p>Don't Have an account? <a href="register.php">Register here</a></p>
      </div>
    </fieldset>
</form>
<?php
include('components/footer.php');
?>