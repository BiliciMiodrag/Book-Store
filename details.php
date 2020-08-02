<?php 

include "connection.php";
include "registration/registration-funtctions.php";
require_once "layout/layout1.php";
$book_isbn = $_GET['book_isbn'];

if ($db->connect_errno) {
    printf("Connect failed: %s\n", $db->connect_error);
    exit();
}
$query = "SELECT * FROM books WHERE book_isbn = '$book_isbn'";

if ($result = $db->query($query)) {

    /* fetch associative array */
    $row = $result->fetch_assoc();
    if(!$row){
    echo "Empty book";
    exit;
  }
}
?>

<p class="lead" style="margin: 25px 25px"><a href="index.php">Books</a> > <?php echo $row['book_title']; ?></p>
      <div class="row">
        <div class="col-md-3 text-center">
          <img class="img-responsive img-thumbnail" src="./resources/img/<?php echo $row['book_image']; ?>">
        </div>
        <div class="col-md-6">
          <h4>Book Description</h4>
          <p><?php echo $row['book_descr']; ?></p>
          <h4>Book Details</h4>
          <table class="table">
          	<?php foreach($row as $key => $value){
             if($key == "book_descr" || $key == "book_image" || $key == "publisher_id" || $key == "book_title" || $key == "id" ||$key == "quantity"){
                continue;
              }
              switch($key){
                case "book_isbn":
                  $key = "ISBN";
                  break;
                case "book_title":
                  $key = "Title";
                  break;
                case "book_author":
                  $key = "Author";
                  break;
                case "book_price":
                  $key = "Price";
                  break;
              }

              
            ?>
            <tr>
              <td><?php echo $key; ?></td>
              <td><?php echo $value; ?></td>
            </tr>
            <?php 
              } 
              if(isset($conn)) {mysqli_close($conn); }
            ?>
          </table>
          <form method="post" action="cart.php">
            <input type="hidden" name="bookisbn" value="<?php echo $book_isbn;?>">
            <input type="submit" value="Add to cart" name="cart" class="btn btn-primary">
          </form>
       	</div>
      </div>
<?php
  require "./layout/layout2.php";
?>

