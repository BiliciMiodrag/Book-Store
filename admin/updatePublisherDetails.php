
<?php
if(isset($_POST))
{
    include("../connection.php");
    // get values
    $publisherid = $_POST['publisherid'];
     $publisher_name = $_POST['name'];
    

    // Update book details
    $query2 = "UPDATE publisher SET publisher_name = '$publisher_name' WHERE publisherid = '$publisherid'";
    if (!$result = mysqli_query($db, $query2)) {
        exit(mysqli_error($db));
    }
}

?>