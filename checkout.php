<?php

include "registration/registration-funtctions.php";

require_once "functions/database_functions.php";
if(!(isset($_SESSION['user']) && $_SESSION['user'] != '')){
                header ("Location:registration/login.php");
            }
require_once "layout/layout1.php";





if(isset($_SESSION['cart']) && (array_count_values($_SESSION['cart']))){
	?>

	<table class="table">
		<tr>
			<th>Item</th>
			<th>Price</th>
			<th>Quantity</th>
			<th>Total</th>
		</tr>
		<?php
		foreach($_SESSION['cart'] as $isbn => $qty){
			$db = db_connect();
			$book = mysqli_fetch_assoc(getBookByIsbn($db, $isbn));
			?>
			<tr>
				<td><?php echo $book['book_title'] . " by " . $book['book_author']; ?></td>
				<td><?php echo "$" . $book['book_price']; ?></td>
				<td><?php echo $qty; ?></td>
				<td><?php echo "$" . $qty * $book['book_price']; ?></td>
			</tr>
		<?php } ?>
		<tr>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
			<th><?php echo $_SESSION['total_items']; ?></th>
			<th><?php echo "$" . $_SESSION['total_price']; ?></th>
		</tr>
	</table>
	<form method="post" action="purchase.php" class="form-horizontal" style="margin-left: 20px;">
		<?php if(isset($_SESSION['err']) && $_SESSION['err'] == 1){ ?>
			<p class="text-danger">All fields have to be filled</p>
		<?php } ?>
		<?php 

		if (isLoggedIn()==true){
			$id=$_SESSION['user']['id'];
			$query="SELECT *FROM users WHERE id='$id'";
			$results = mysqli_query($db, $query);
			while ( $row=mysqli_fetch_assoc($results)) { ?>
				<div class="form-group">
					<label for="name" class="control-label col-md-8">First Name</label>
					<div class="col-md-8">
						<input type="text" name="fname" class="col-md-8" class="form-control" value="<?php if ($row['fname'] != "") {echo $row['fname']; }?>" required>
					</div>
				</div>
				<div class="form-group">
					<label for="name" class="control-label col-md-8">Last Name</label>
					<div class="col-md-8">
						<input type="text" name="lname" class="col-md-8" class="form-control" value="<?php if ($row['lname'] != "") {echo $row['lname']; }?>" required>
					</div>
				</div>
				<div class="form-group">
					<label for="name" class="control-label col-md-8">Phone Number</label>
					<div class="col-md-8">
						<input type="phone" name="phone" class="col-md-8" class="form-control" value="<?php if ($row['phone'] != "") {echo $row['phone']; }?>"required>
					</div>
				</div>
				<div class="form-group">
					<label for="address" class="control-label col-md-8">Address</label>
					<div class="col-md-8">
						<input type="text" name="address" class="col-md-8" class="form-control" value="<?php if ($row['adress'] != "") {echo $row['adress']; }?>" required>
					</div>
				</div>
				<div class="form-group">
					<label for="city" class="control-label col-md-8">City</label>
					<div class="col-md-8">
						<input type="text" name="city" class="col-md-8" class="form-control" value="<?php if ($row['city'] != "") {echo $row['city']; }?>" required>
					</div>
				</div>
				<div class="form-group">
					<label for="zip_code" class="control-label col-md-8">Zip Code</label>
					<div class="col-md-8">
						<input type="text" name="zip_code" class="col-md-8" class="form-control" value="<?php if ($row['zip_code'] != "") {echo $row['zip_code']; }?>" required>
					</div>
				</div>
				<div class="form-group">
					<label for="country" class="control-label col-md-8">Country</label>
					<div class="col-md-8">
						<input type="text" name="country" class="col-md-8" class="form-control" value="<?php if ($row['country'] != "") {echo $row['country']; }?>" required>
					</div>
				</div>
			<?php } } ?>

				
			<div class="form-group">
				<input type="submit" name="submit" value="Purchase" class="btn btn-primary" >
			</div>
		</form>
		<p style="margin-left: 20px;" class="lead">Please press Purchase to confirm your purchase, or Continue Shopping to add or remove items.</p>
		<?php
	} else {
		echo "<p style=\"margin-left:20px; \" class=\"text-warning\">Your cart is empty! Please make sure you add some books in it!</p>";
	}
	if(isset($db)){ mysqli_close($db); }
	require_once "./layout/layout2.php";
	?>