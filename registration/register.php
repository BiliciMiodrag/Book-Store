<?php
include ('registration-funtctions.php');
require_once "../layout/header.php";

?>


<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
<link rel="stylesheet" href="../resources/register.css">
<div class="card bg-light">
	<article class="card-body mx-auto" style="max-width: 400px;">
		<h4 class="card-title mt-3 text-center">Create Account</h4>
		
		
		<p class="divider-text">
			<span class="bg-light"></span>
		</p>
		<form method="post" action="register.php">
			<div style="color:red;"><?php echo display_error(); ?></div>
			<div id="error_msg"></div>
			<div class="form-group input-group">
				<div class="input-group-prepend">
					<span class="input-group-text"> <i class="fa fa-user"></i> </span>
				</div>
				<input name="fname" class="form-control" placeholder="First Name" id="fname"type="text" required>
			</div> <!-- form-group// -->
			<div class="form-group input-group">
				<div class="input-group-prepend">
					<span class="input-group-text"> <i class="fa fa-user"></i> </span>
				</div>
				<input name="lname" class="form-control" placeholder="Last Name" id="lname" type="text" required >
			</div> <!-- form-group// -->
			<div class="form-group input-group">
				<div class="input-group-prepend">
					<span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
				</div>
				<input name="email" class="form-control" placeholder="Email address" id="email" type="email" required>
				<span id="email_status"></span>
			</div> <!-- form-group// -->
			<div class="form-group input-group">

				<div class="form-group input-group">
					<div class="input-group-prepend">
						<span class="input-group-text"> <i class="fa fa-lock"></i> </span>
					</div>
					<input name="password" class="form-control" placeholder="Create password" id="password" type="password" required>
				</div> <!-- form-group// -->
				<div class="form-group input-group">
					<div class="input-group-prepend">
						<span class="input-group-text"> <i class="fa fa-lock"></i> </span>
					</div>
					<input name="confirmed_password" class="form-control" placeholder="Repeat password" id="confirmed_password" type="password" required>
				</div> <!-- form-group// -->                                      
				<div class="form-group">
					<button type="submit" class="btn btn-primary btn-block" name="register_btn" id="reg_btn"> Create Account  </button>
				</div> <!-- form-group// -->      
				<p style="padding-left: 20px;" class="text-center">Have an account? <a href="login.php">Log In</a> </p>                                                                 
			</form>
		</article>
	</div> <!-- card.// -->

</div> 


<?php
require_once "../layout/footer.php";
?>

<script type="text/javascript" src="/resources/checkemail.js"></script>
