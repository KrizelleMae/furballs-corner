<?php
    session_start();
    
   include 'admin/actions/db_connect.php';
   

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
   
    <title>Furballs Corner</title>


    <!--Main CSS File -->
    <link type="text/css" rel="stylesheet" href="css/main.css"/>
    <link type="text/css" rel="stylesheet" href="css/acc.css"/>
    <link type="text/css" rel="stylesheet" href="css/panel.css"/>


    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

    <!-----------JSLOADER------------------>
    <script src="js/main.js"></script>
    <script src="main.js"></script>

  </head> 
  <body>
  <header>
    
    <div class="logo">
        <img src="assets/fclogo.png"/> 
        <a href="index.php">
            <h3>Furballs Corner<h3>
        </a>
    </div>

    
    <form name="search" method="post" action="search_result.php">
        <div class="searchwrapper">
            <input type="search" name="product" placeholder="Search.." required="required" /> <button type="submit" name="search"><i class="fas fa-search"></i></button>
         </div>
    </form>
                            
   <?php

    // $user_id = $_SESSION['user_id'];
    // $stmt = $connect->prepare("SELECT COUNT(product_id) from cart WHERE user_id = $user_id");
    // $stmt->execute();
    // $res = $stmt->get_result();
    // $count = $res->fetch_row();

?>

    <div class="bag">
        <a href="bagview.php">
        <i class="fas fa-shopping-bag"></i><span style="font-size:15px;" class="badge"></span>
        </a>
    </div>  

   <div class="navigate">
   <input type="checkbox"  class="navbar-toggle">
   <div class="hamburger"></div>
        <div class="menu">
            <a href="index.php" >Home</a>
            <a href="#category">Category</a>
            <?php
                if (isset($_SESSION["user_id"])) {
                    echo "<a href='account.php'>Account</a>";
                    echo "<a href='logout.php'>Logout</a>";
                }
                else {
                    echo "<a href='login.php'>Login</a>";
                    echo "<a href='register.php'>Register</a>"; 
                }
            ?>

           
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous">
    </script>
        

</header>

