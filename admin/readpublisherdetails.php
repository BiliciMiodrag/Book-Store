<?php
 include("../connection.php");
if(isset($_POST['publisherid']) && isset($_POST['publisherid']) != "")
{
    // get User ID
    $publisherid = $_POST['publisherid'];
 
    // Get User Details
    $query2 = "SELECT * FROM publisher WHERE publisherid = '$publisherid'";
    if (!$result = mysqli_query($db, $query2)) {
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