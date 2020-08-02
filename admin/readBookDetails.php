<?php
// include Database connection file
include("../connection.php");
 
// check request
if(isset($_POST['id']) && isset($_POST['id']) != "")
{
    // get User ID
    $id = $_POST['id'];
 
    // Get User Details
    $query = "SELECT * FROM books WHERE id = '$id'";
    if (!$result = mysqli_query($db, $query)) {
        exit(mysqli_error($db));
    }
    $response = array();
    if(mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $response = $row;
        }
    }
    else
    {
        $response['status'] = 200;
        $response['message'] = "Data not found!";
    }
    // display JSON data
    echo json_encode($response);
}
else
{
    $response['status'] = 200;
    $response['message'] = "Invalid Request!";
}


?>