<?php
//session_start();
include "registration/registration-funtctions.php";
require_once "functions/database_functions.php";
require_once "functions/shopping_cart_func.php";
require_once "layout/layout1.php";


  // book_isbn obtinut din formular cu metoda post
if(isset($_POST['bookisbn'],$_POST['quantity'])){
  $book_isbn = $_POST['bookisbn'];
  $quantity = $_POST['quantity'];
}




if(isset($book_isbn) &&  isset($quantity)){
    // un nou produs selectat
  if(!isset($_SESSION['cart'])){

    $_SESSION['cart'] = array();

    $_SESSION['total_items'] = 0;
    $_SESSION['total_price'] = '0.00';
  }

  if(!isset($_SESSION['cart'][$book_isbn])){
    $_SESSION['cart'][$book_isbn] = $quantity;
  } elseif(isset($_POST['cart'])){
    $_SESSION['cart'][$book_isbn]++;
    //$_SESSION['total_items']+= $_SESSION['cart'][$quantity];
    unset($_POST);
  }
}


if (isset($_POST['action']) && $_POST['action']=="remove"){
  if(!empty($_SESSION["cart"])) {
    foreach($_SESSION["cart"] as $key => $value) {
      if($_POST["isbn_remove"] == $key){
        unset($_SESSION["cart"][$key]);
        $status = "<div class='box' style='color:red;'>
        Product is removed from your cart!</div>";
      }
      if(empty($_SESSION["shopping_cart"]))
        unset($_SESSION["shopping_cart"]);
    } 
  }
}




if(isset($_SESSION['cart']) && (array_count_values($_SESSION['cart']))){
  $_SESSION['total_price'] = total_price($_SESSION['cart']);
  $_SESSION['total_items'] = total_items($_SESSION['cart']);
  ?>
  <form action="cart.php" method="post">
    <table class="table">
      <tr>
        <th>Item</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Total</th>
        <th>Remove</th>
      </tr>
      <?php
      foreach($_SESSION['cart'] as $isbn => $qty){

        $book = mysqli_fetch_assoc(getBookByIsbn($db, $isbn));
       // print_r($isbn);
         //print_r($quantity);
        

        ?>
        <tr>
          <td><?php echo $book['book_title'] . " by " . $book['book_author']; ?></td>
          <td><?php echo "$" . $book['book_price']; ?></td>
          <td class="quantity">
            <input type="text" name="<?=$book['book_isbn']?>" value="<?php echo $qty ?>" min="1" max="<?=$book['quantity']?>" placeholder="Quantity" required>
          </td>
          <td><?php echo "$" . $qty * $book['book_price']; ?></td>
          <td><form method='post' action=''>
            <input type='hidden' name="isbn_remove" value="<?php echo $isbn ?>" />
            <input type='hidden' name='action' value="remove" />
            <button type='submit' class='remove'>Remove Item</button>
          </form></td>
        </tr>


      <?php } ?>
      <tr>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th style=""><?php echo $_SESSION['total_items']; ?></th>
        <th><?php echo "$" . $_SESSION['total_price']; ?></th>
      </tr>
    </table>
  </form>
  <br/><br/>
  <a href="checkout.php" style="margin:20px;" class="btn btn-primary">Go To Checkout</a> 
  <a href="index.php" class="btn btn-primary">Continue Shopping</a>
  <?php
} else {
  echo "<p  style=\"margin:25px; \" class=\"text-warning\">Your cart is empty! Please make sure you add some books in it!</p>";
}
if(isset($conn)){ mysqli_close($conn); }
require_once "layout/layout2.php";
?>