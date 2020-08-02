<?php
	include "registration/registration-funtctions.php";
	require_once "functions/database_functions.php";
	require_once "layout/layout1.php";
	$_SESSION['err'] = 1;
	foreach($_POST as $key => $value){
		if(trim($value) == ''){
			$_SESSION['err'] = 0;
		}
		break;
	}

	if($_SESSION['err'] == 0){
		header("Location: checkout.php");
	} else {
		unset($_SESSION['err']);
	}


	$_SESSION['ship'] = array();
	foreach($_POST as $key => $value){
		if($key != "submit"){
			$_SESSION['ship'][$key] = $value;
		}
	}

	// print out header here
	$title = "Purchase";
	
	// connect database
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
		<tr>
			<td>Shipping</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>20.00</td>
		</tr>
		<tr>
			<th>Total Including Shipping</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
			<th><?php echo "$" . ($_SESSION['total_price'] + 20); ?></th>
		</tr>
	</table>
	<form method="post" action="process.php" class="form-horizontal">
		<?php if(isset($_SESSION['err']) && $_SESSION['err'] == 1){ ?>
		<p class="text-danger">All fields have to be filled</p>
		<?php } ?>
        <div class="form-group">
            <label for="card_type" class="col-lg-2 control-label">Payment modality</label>
            <div class="col-lg-10">
              	<select class="form-control" name="card_type" >
                  	<option value="Cash">Cash</option>
                  	<option value="Card">Card</option>
              	</select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
              	<button type="reset" class="btn btn-default">Cancel</button>
              	<button type="submit" class="btn btn-primary">Purchase</button>
              	<a href="index.php" class="btn btn-primary">Continue Shopping</a>
            </div>
        </div>
    </form>
	<p style="margin-left: 20px;" class="lead">Please press Purchase to confirm your purchase, or Continue Shopping to add or remove items.</p>
<?php
	} else {
		echo "<p style=\"margin-left:20px; \" class=\"text-warning\">Your cart is empty! Please make sure you add some books in it!</p>";
	}
	if(isset($conn)){ mysqli_close($conn); }
	require_once "./layout/layout2.php";
?>