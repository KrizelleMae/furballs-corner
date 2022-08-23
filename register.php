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

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phonenumber = $_POST['phonenumber'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    if(!empty($firstname) && !empty($lastname) && !empty($address) && !empty($phonenumber) &&!empty($password) && !is_numeric($firstname) && !is_numeric($lastname) && (pwdMatch($password, $cpassword) !== true))
    {	

      
        $user_id = random_num(20);
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $query = "insert into customer (user_id,firstname,lastname,email,address,phonenumber,password) values ('$user_id','$firstname','$lastname','$email','$address','$phonenumber','$hash')";
        
        mysqli_query($con,$query);

        
        header("Location:login.php");
         die;
       

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
   
    <title>Furballs Corner | Register </title>


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
<form id="form-input" action="register.php" method="post">

    <fieldset>
      <h2 class="form-title">Registration</h2>
      <h3 class="form-subtitle">create an account</h3>
      <input type="text" minlength="2" name="firstname" placeholder="First Name" required />
      <input type="text" minlength="2" name="lastname" placeholder="Last Name" required/>
      <input type="email" name="email" placeholder="Email" required/>
      <input type="text" minlength="2" name="address" placeholder="Address" required/>
      <input type="number" maxlength="11" name="phonenumber" placeholder="Phone Number" required/>
      
      <input type="password" minlength="6" name="password" placeholder="Password" required/>
      <input type="password" name="cpassword" placeholder="Confirm Password" required/>
      
      <input type="submit" name="submit" class="registerbtn action-button" value="Register" />
      <div class="connect">
        <p>or connect with</p>
      </div>
      <div class="social-links">
        <button class="google-btn">Google Account</button>
      </div>
      <div class="linking">
        <p>Already Have an account? <a href="login.php">Login here</a></p>
      </div>
    </fieldset>
  </form>
  
<?php
include('components/footer.php');
?>