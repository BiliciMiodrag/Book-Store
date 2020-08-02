<?php 

// connect to database
$db = mysqli_connect('localhost', 'root', '', 'bookstorephp');
if($db===false){
	die("ERROR: Could not connect.".$mysqli->connect_error);
}
?>