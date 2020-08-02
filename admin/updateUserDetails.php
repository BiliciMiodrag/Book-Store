<?php
// include Database connection file
include("../connection.php");

// check request
if(isset($_POST))
{
    // get values
    $id = $_POST['id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $adress = $_POST['adress'];
    $city = $_POST['city'];
    $zip = $_POST['zip_code'];
    $country = $_POST['country'];

    // Update book details
    $query = "UPDATE users SET fname = '$fname', lname = '$lname', email = '$email' , phone = '$phone', adress = '$adress', city = '$city', zip_code = '$zip', country = '$country' WHERE id = '$id'";
    if (!$result = mysqli_query($db, $query)) {
        exit(mysqli_error($db));
    }
}