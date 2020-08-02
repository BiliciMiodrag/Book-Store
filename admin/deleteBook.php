<?php
// check request
if(isset($_POST['id']) && isset($_POST['id']) != "")
{
    // include Database connection file
    include("../connection.php");

    // get user id
    $id = $_POST['id'];

    // delete User
    $query = "DELETE FROM books WHERE id = '$id'";
    if (!$result = mysqli_query($db, $query)) {
        exit(mysqli_error($db));
    }
}

if(isset($_POST['publisherid']) && isset($_POST['publisherid']) != "")
{
    
include("../connection.php");
    // get user id
    $publisherid = $_POST['publisherid'];

    // delete User
    $query2 = "DELETE FROM publisher WHERE publisherid = '$publisherid'";
    if (!$result = mysqli_query($db, $query2)) {
        exit(mysqli_error($db));
    }
}


?>