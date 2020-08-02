<?php
// include Database connection file
include("../connection.php");

// check request
if(isset($_POST))
{
    // get values
    $id = $_POST['id'];
    $isbn = $_POST['isbn'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $image = $_POST['image'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $publisherid = $_POST['publisherid'];

    // Update book details
    $query = "UPDATE books SET book_isbn = '$isbn', book_title = '$title', book_author = '$author' , book_image = '$image', book_descr = '$description', book_price = '$price', quantity = '$quantity', publisher_id = '$publisherid' WHERE id = '$id'";
    if (!$result = mysqli_query($db, $query)) {
        exit(mysqli_error($db));
    }
}

