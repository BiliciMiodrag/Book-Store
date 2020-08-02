<?php

//session_start();
include "registration/registration-funtctions.php";
include ("connection.php");
require_once "layout/layout1.php";
include "functions/shopping_cart_func.php";

$count = 0;
$query = "SELECT * FROM books";
  $result = mysqli_query($db, $query);
  if(!$result){
    echo "Can't retrieve data " . mysqli_error($db);
    exit;
  }

?>
<style >
  body{
display: initial;
  }
</style>
<link rel="stylesheet" type="text/css" href="resources/books.css">
    <?php for($i = 0; $i < (mysqli_num_rows($result)/4); $i++){ ?>
      <div class="row" style="padding: 25px " >
        <?php while($query_row = mysqli_fetch_assoc($result)){ ?>
          
          <div class="col-md-3">
          	<div class="book">
          	<div class="book_image">	
            <a href="details.php?book_isbn=<?php echo $query_row['book_isbn']; ?>">
              <img class="img-responsive img-thumbnail" src="./resources/img/<?php echo $query_row['book_image']; ?>">
            </a>
        </div>
            <div class="book_title" ><p > <?php echo $query_row['book_title']; ?></p></div>
            <div class="book_actions">
            	<div class="book_price">Price <?php echo $query_row['book_price']; ?></div>
            	<div class="book_add"><form method="post" action="cart.php">
            <input type="hidden" name="bookisbn"  value="<?php echo $query_row['book_isbn'];?>">
             <input type="number" name="quantity" id="quantity" value="1" min="1" max="<?=$query_row['quantity']?>" placeholder="Quantity" required>
            <input type="submit" value="Add to cart" name="cart" class="btn btn-primary">
          </form></div>
            </div> 
        </div>
          
      </div>
        <?php
          $count++;
          if($count >= 4){
              $count = 0;
              break;
            }
          } ?> 
      </div>
 
<?php
      }
      //session_destroy();
      
  if(isset($conn)) { mysqli_close($conn); }
  require_once "./layout/layout2.php";
?>