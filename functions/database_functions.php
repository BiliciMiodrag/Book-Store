<?php

function db_connect(){
	$db = mysqli_connect("localhost", "root", "", "bookstorephp");
	if(!$db){
		echo "Can't connect database " . mysqli_connect_error($db);
		exit;
	}
	return $db;
}


function getbookprice($isbn){
	$db=db_connect();
	$query = "SELECT book_price FROM books WHERE book_isbn = '$isbn'";
	$result = mysqli_query($db, $query);
	if(!$result){
		echo "get book price failed! " . mysqli_error($db);
		exit;
	}
	$row = mysqli_fetch_assoc($result);
	return $row['book_price'];
}


function getBookByIsbn($db, $isbn){
	$query = "SELECT * FROM books WHERE book_isbn = '$isbn'";
	$result = mysqli_query($db, $query);
	if(!$result){
		echo "Can't retrieve data " . mysqli_error($db);
		exit;
	}
	return $result;
}


function insertIntoOrder($db, $id, $total_price, $date, $ship_fname,$ship_lname,$phone ,$ship_address, $ship_city, $ship_zip_code, $ship_country){
	$query = "INSERT INTO orders VALUES 
	('', '" . $id . "', '" . $total_price . "', '" . $date . "', '" . $ship_fname . "','" . $ship_lname . "' ,'" . $phone . "','" . $ship_address . "', '" . $ship_city . "', '" . $ship_zip_code . "', '" . $ship_country . "')";
	$result = mysqli_query($db, $query);
	if(!$result){
		echo "Insert orders failed " . mysqli_error($db);
		exit;
	}
}


function getOrderId($db, $id){
	$query = "SELECT orderid FROM orders WHERE user_id = '$id'
	ORDER BY orderid DESC LIMIT 1";


	$result = mysqli_query($db, $query);
	if(!$result){
		echo "retrieve data failed!" . mysqli_error($db);
		exit;
	}
	$row = mysqli_fetch_assoc($result);
	return $row['orderid'];
}

?>