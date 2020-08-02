<?php
	if(isset($_POST['isbn']) && isset($_POST['title']) && isset($_POST['author']) && isset($_POST['image']) && isset($_POST['description']) && isset($_POST['price']) && isset($_POST['quantity']) && isset($_POST['publisherid']) ) 
	{
		// include Database connection file 
		include("../connection.php");
 
		// get values 
		$isbn = $_POST['isbn'];
		$title = $_POST['title'];
		$author = $_POST['author'];
		$image = $_POST['image'];
		$description = $_POST['description'];
		$price = $_POST['price'];
		$quantity = $_POST['quantity'];
		$publisherid = $_POST['publisherid'];
 
		$query = "INSERT INTO books(book_isbn, book_title, book_author, book_image, book_descr, book_price, quantity, publisher_id) VALUES('$isbn', '$title', '$author','$image','$description', '$price', '$quantity', '$publisherid')";
		if (!$result = mysqli_query($db, $query)) {
	        exit(mysqli_error($db));
	    }
	    echo "1 Record Added!";
	}


	
?>