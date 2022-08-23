<?php 
include('include/header.php'); 
?>
<div class="loader">
    <img src="assets/dualball.gif" alt="Loading..." />
</div>

<div class="mainbod">
  <div class="sidebar">
    <div class="profile_content">
      <div class="profile">
        <div class="profile_name">UserName</div>
      </div>
      <i class="fa fa-bars" id="btn" ></i>
    </div>
    <ul class="nav_list">
      <li>
        <a href="#">
          <i class="fa fa-user" ></i>
          <span class="links_name">Profile</span>
        </a>
        <span class="tooltip">Profile</span>
      </li>
      
      <li>
        <a href="#">
          <i class="fa fa-id-card info" ></i>
          <span class="links_name">Address</span>
        </a>
        <span class="tooltip">Address</span>
      </li>
      
      <li>
        <a href="#">
        <i class="fa fa-minus-square" ></i>
          <span class="links_name">My Orders</span>
        </a>
        <span class="tooltip">My Orders</span>
      </li>
     
    </ul>
  
  </div>
  <div class="content">
    <div class="content_body">Content</div>

<?php 
include('include/footeracc.php'); 
?>
  </div>


</div>

    

<script>
   let btn = document.querySelector("#btn");
   let sidebar = document.querySelector(".sidebar");

   btn.onclick = function() {
     sidebar.classList.toggle("active");
   }
  
  </script>
</body>

</html>