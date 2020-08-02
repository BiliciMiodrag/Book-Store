
	<?php
include ('registration-funtctions.php');
require_once "../layout/header.php";

?>

	<form class="login-form" action="login.php" method="post" style="text-align: center; margin: 30px;">
		<p>
			We sent an email to  <b><?php echo $_GET['email'] ?></b> to help you recover your account. 
		</p>
	    <p>Please login into your email account and click on the link we sent to reset your password</p>
	</form>


	<?php

require_once "../layout/footer.php";

?>