<?php
include ("../registration/registration-funtctions.php");
require_once "../layout/layout1.php";
?>

<title>Create user</title>


	
	<form method="post" action="create_user.php" class="text-center border border-light p-5">

		<?php echo display_error(); ?>
		<p class="h4 mb-4">Admin Create User</p>
		<div class="input-group">
			<input type="text" name="fname" class="form-control mb-4" placeholder="First Name">
		</div>
		<div class="input-group">
			
			<input type="text" name="lname"  class="form-control mb-4" placeholder="Last Name">
		</div>
		<div class="input-group">
			<input type="email" name="email" class="form-control mb-4" placeholder="Email">
		</div>
		<div class="input-group">
			<select name="user_type" id="user_type"  class="browser-default custom-select mb-4" >
				<option value=""> Select user type</option>
				<option value="admin">Admin</option>
				<option value="user">User</option>
			</select>
		</div>
		<div class="input-group">
			<input type="password" name="password" class="form-control mb-4" placeholder="Password">
		</div>
		<div class="input-group">
			
			<input type="password" name="rpassword" class="form-control mb-4" placeholder="Confirm password">
		</div>
		<div class="input-group">
			<button type="submit"  class="btn btn-info btn-block" name="register_btn"> + Create user</button>
		</div>
	</form>

	<?php
require_once "../layout/layout2.php";
?>