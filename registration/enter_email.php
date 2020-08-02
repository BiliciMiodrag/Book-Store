
<?php
include ('registration-funtctions.php');
require_once "../layout/header.php";

?>
<form class="login-form" action="enter_email.php" method="post">
	<h2 class="form-title">Reset password</h2>
	<!-- form validation messages -->
	<?php echo display_error(); ?>
	<div class="form-group">
		<label><b>Your email address</b></label>
		<input type="email" name="email">
	</div>
	<div class="form-group">
		<button type="submit" name="reset-password" class="btn btn-primary">Submit</button>
	</div>
</form>
<?php
require_once "../layout/footer.php";
?>