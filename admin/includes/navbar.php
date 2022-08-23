

<header>
    
    <div class="logo">
        <img src="assets/fclogo.png"/> 
        <a href="index.php">
            <h4>Furballs Corner Admin<h4>
        </a>
    </div>

   

   <div class="navigate">
   <input type="checkbox"  class="navbar-toggle">
   <div class="hamburger float-right"></div>
        <div class="menu">
            <a href="dashboard.php" > Dashboard</a>
            <li class="dropdown" id="navOrder">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Orders <span class="caret"></span></a>
          <ul class="dropdown-menu">            
            <li id="topNavAddOrder"><a href="orders.php?o=add"> Walk-In</a></li>            
            <li id="topNavManageOrder"><a href="orders.php?o=manord"> Manage Orders</a></li>            
          </ul>
        </li>   
            <a href="categories.php">Categories</a>
            <a href="product.php"> Products</a>
         
            <li class="dropdown" id="navSetting">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i><span class="caret"> </span></a>
          <ul class="dropdown-menu">            
            <li id="topNavSetting"><a href="setting.php"> Setting</a></li>            
            <li id="topNavLogout"><a href="logout.php">Logout</a></li>            
          </ul>
        </li>        
            

           
        </div>
    </div>
        

</header>


	<div class="container">