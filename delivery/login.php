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
    <link type="text/css" rel="stylesheet" href="css/style.css"/>
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
<form id="form-input" action="login.php" method="post">
    <fieldset>
      <h2 class="form-title">Delivery Login</h2>
      <h3 class="form-subtitle">login using your employee account</h3>
      <input type="email" name="email" placeholder="Email" />
      <input type="password" minlength="6" name="password" placeholder="Password" />
      <div class="reset">Contact admin to change password</div>
      <input type="submit" name="submit" class="logintbn action-button" value="Login" />
    </fieldset>
</form>
</body>
</html>