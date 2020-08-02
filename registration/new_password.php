
<?php
include ('registration-funtctions.php');
require_once "../layout/header.php";

?>


<form class="text-center border border-light p-5" action="new_password.php" method="post">
		<p class="h4 mb-4">New Password</p>
		<!-- form validation messages -->
		<?php echo display_error(); ?>
		<div class="form-group">
			<label>New password</label>
			<input type="password" name="new_pass" class="form-control mb-4">
		</div>
		<div class="form-group">
			<label>Confirm new password</label>
			<input type="password" name="new_pass_c" class="form-control mb-4">
		</div>
		<div class="form-group">
			<button type="submit" name="new_password" class="btn btn-info btn-block">Submit</button>
		</div>
	</form>

	<?php

require_once "../layout/footer.php";

?>