<?php 
include("../connection.php");
if(isset($_POST['name'])){
	$name=$_POST['name'];
	
	

	$query2 = "INSERT INTO publisher (publisher_name) VALUES ('$name')";
	if (!$result = mysqli_query($db, $query2)) {
	        exit(mysqli_error($db));
	    }
	    echo "1 Record Added!";
	    
}
?>