<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
     <!--logo-->
     <link rel="shortcut icon" href="assets/fclogo.png"/>
     
     <meta name="viewport" content="width=device-width,height=device-height, initial-scale=1.0"/>
     <meta
      name="description"
      content="Buy,Shop,Browse and Order Pet Products"
    />
    <meta
      name="keywords"
      content="Pet products, Dog Products, Furballs Corner, Furr Parent, Pet accessories, Pet Clothes, Pet Shop"
    />
   
    <title>Furballs Corner Delivery</title>


    <!--Main CSS File -->
    <link type="text/css" rel="stylesheet" href="css/styles.css"/>
    <link type="text/css" rel="stylesheet" href="css/account.css"/>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

    <!-----------JSLOADER------------------>
    <script src="js/main.js"></script>

  </head>
  <body>
  <header>
    
    <div class="logo">
        <img src="assets/fclogo.png"/> 
        <a href="index.php">
            <h3>Furballs Corner <h3>
            <p>Delivery<p>
        </a>
    </div>


   <div class="navigate">
   <input type="checkbox"  class="navbar-toggle">
   <div class="hamburger"></div>
        <div class="menu">
            <a href="index.php" >Home</a>
            <a href="deliveryorders.php">Delivery Orders</a>
            <ul>
                <li><a href="#" ><p>Process Delivery</p></a></li>
                <li><a href="#" ><p>Complete Delivery</p></a></li>
            </ul>
            <a href='account.php'>Account</a>
            <a href='logout.php'>Logout</a>
              

           
        </div>
    </div>
        

</header>

