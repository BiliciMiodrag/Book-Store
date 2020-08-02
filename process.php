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
		header("Location: purchase.php");
	} else {
		unset($_SESSION['err']);
	}

	
	
	
	// connect database
	$db = db_connect();
	extract($_SESSION['ship']);

	$id=$_SESSION['user']['id'];

	
	$date = date("Y-m-d H:i:s");
	insertIntoOrder($db, $id, $_SESSION['total_price'], $date, $fname, $lname,$phone,$address,$city, $zip_code, $country);

	// take orderid from order to insert order items
	$orderid = getOrderId($db, $id);

	foreach($_SESSION['cart'] as $isbn => $qty){
		$bookprice = getbookprice($isbn);
		$query = "INSERT INTO order_items VALUES 
		('$orderid', '$isbn', '$bookprice', '$qty')";
		$result = mysqli_query($db, $query);
		if(!$result){
			echo "Insert value false!" . mysqli_error($db);
			exit;
		}
	}

	session_unset();
?>
	<p style="margin:25px 20px; text-align: center;" class="lead text-success">Your order has been processed sucessfully. Please check your email to get your order confirmation and shipping detail!. 
	Your cart has been empty.</p>

<?php
	if(isset($db)){
		mysqli_close($db);
	}
	require_once "layout/layout2.php";
?>