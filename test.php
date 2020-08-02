<?php
require_once "functions/database_functions.php";
require_once "layout/layout1.php";

$query="SELECT DISTINCT * FROM books INNER JOIN publisher ON publisher_id=publisherid";
$result = mysqli_query($db, $query);
while($row = mysqli_fetch_assoc($result)){


echo $row['publisher_name'];
    
}
require_once "./layout/layout1.php";
?>