<?php
include "registration/registration-funtctions.php";
include ("connection.php");
require_once "layout/layout1.php";

if(isset($_GET['publisher_id'])){
    $publisher_id = $_GET['publisher_id'];
  } else {
    echo "Wrong query! Check again!";
    exit;
  }

$query = "SELECT book_isbn, book_image, book_title, book_price FROM books WHERE publisher_id=$publisher_id";
  $result = mysqli_query($db, $query);
  if(!$result){
    echo "Can't retrieve data " . mysqli_error($db);
    exit;
  }

  if(mysqli_num_rows($result) == 0){
    echo "Empty books ! Please wait until new books coming!";
    exit;
  }

?>
<style >
  body{
display: initial;
  }
</style>

<link rel="stylesheet" type="text/css" href="resources/books.css">
    <?php while($row = mysqli_fetch_assoc($result)){
?>
 <div class="row" style="padding: 25px">
    <div class="col-md-3">
      <img class="img-responsive img-thumbnail" src="./resources/img/<?php echo $row['book_image'];?>">
    </div>
    <div class="col-md-7">
      <h4><?php echo $row['book_title'];?></h4>
      <a href="details.php?book_isbn=<?php echo $row['book_isbn'];?>" class="btn btn-primary">Get Details</a>
      <a href="#" class="btn btn-primary">Add to Cart</a>
    </div>
  </div>
  <br>
<?php
      }
  if(isset($conn)) { mysqli_close($conn); }
  require_once "./layout/layout2.php";
?>