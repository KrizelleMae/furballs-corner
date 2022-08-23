<?php 
include_once 'components/header.php'; 
?>
<?php
include("connect.php");
include("functions.php");

$user_data = check_login($con);

?>
<div class="loader">
    <img src="assets/dualball.gif" alt="Loading..." />
</div>
<div class="account">
<div class="mainbod">
  <div class="sidebar">
    <div class="profile_content">
      <div class="profile">
        <div class="profile_name"> <?php echo $user_data['firstname']; ?> <?php echo $user_data['lastname']; ?></div>
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
    <div class="content_body">Profile</div>
    
    <div class="row">
	<div class="col-md-12">
  
		

		<div class="panel panel-table">
			<div class="panel-heading">
				<div  class="page-heading"> <i class="glyphicon glyphicon-wrench"></i> </div>
			</div> <!--end of panel-heading -->

			<div class="panel-body">
      <div class="profile-image">
        <img  src = "assets/usericon.png" style="width:10%; margin-left:3rem;">
    </div>

				

				<form action="actions/changeUsername.php" method="post" class="form-horizontal" id="changeUsernameForm">
					<fieldset>
						<legend>Change Profile</legend>

						<div class="changeUsenrameMessages"></div>			

						<div class="form-group">
					    <label for="username" class="col-sm-2 control-label">First Name</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control" id="username" name="firstname" placeholder="Usename" value="<?php echo $user_data['firstname']; ?>"/>
					    </div>
					  </div>
            <div class="form-group">
					    <label for="username" class="col-sm-2 control-label">Last Name</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control" id="username" name="lastname" placeholder="Usename" value="<?php echo $user_data['lastname']; ?>"/>
					    </div>
					  </div>
            <div class="form-group">
					    <label for="username" class="col-sm-2 control-label">Email</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control" id="username" name="email" placeholder="Usename" value="<?php echo $user_data['email']; ?>"/>
					    </div>
					  </div>

					  <div class="form-group">
					    <div class="col-sm-offset-2 col-sm-10">
					    	<input type="hidden" name="user_id" id="user_id" value="<?php echo $result['user_id'] ?>"end of > 
					      <button type="submit" class="btn btn-success" data-loading-text="Loading..." id="changeUsernameBtn"> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes </button>
					    </div>
					  </div>
					</fieldset>
				</form>

				<form action="actions/changePassword.php" method="post" class="form-horizontal" id="changePasswordForm">
					<fieldset>
						<legend>Change Password</legend>

						<div class="changePasswordMessages"></div>

						<div class="form-group">
					    <label for="password" class="col-sm-2 control-label">Current Password</label>
					    <div class="col-sm-10">
					      <input type="password" class="form-control" id="password" name="password" placeholder="Current Password">
					    </div>
					  </div>

					  <div class="form-group">
					    <label for="npassword" class="col-sm-2 control-label">New password</label>
					    <div class="col-sm-10">
					      <input type="password" class="form-control" id="npassword" name="npassword" placeholder="New Password">
					    </div>
					  </div>

					  <div class="form-group">
					    <label for="cpassword" class="col-sm-2 control-label">Confirm Password</label>
					    <div class="col-sm-10">
					      <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password">
					    </div>
					  </div>

					  <div class="form-group">
					    <div class="col-sm-offset-2 col-sm-10">
					    	<input type="hidden" name="user_id" id="user_id" value="<?php echo $result['user_id'] ?>"end of > 
					      <button type="submit" class="btn btn-primary"> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes </button>
					      
					    </div>
					  </div>


					</fieldset>
				</form>

			</div> <!--end of panel-body -->		

		</div> <!--end of panel -->		
	</div> <!--end of col-md-12 -->	
</div> <!--end of row-->


  </div>


</div>
</div>
<?php 
include('components/foot.php'); 
?> 


<script>
   let btn = document.querySelector("#btn");
   let sidebar = document.querySelector(".sidebar");

   btn.onclick = function() {
     sidebar.classList.toggle("active");
   }
  
  </script>

<?php 
include('components/footer.php'); 
?>  
