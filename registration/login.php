
<?php
require_once "../layout/header.php";
include ('registration-funtctions.php');
?>
<link rel="stylesheet" type="text/css" href="../resources/login.css">
<style>
  #parola{
    background-color: #f6f6f6;
  border: none;
  color: #0d0d0d;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 5px;
  
  width: 85%;
  border: 2px solid #f6f6f6;
  -webkit-transition: all 0.5s ease-in-out;
  -moz-transition: all 0.5s ease-in-out;
  -ms-transition: all 0.5s ease-in-out;
  -o-transition: all 0.5s ease-in-out;
  transition: all 0.5s ease-in-out;
  -webkit-border-radius: 5px 5px 5px 5px;
  border-radius: 5px 5px 5px 5px;
  }
</style>
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQt-F5GQg8qB2fWquF1ltQvAT2Z8Dv5pJLb9w&usqp=CAU" id="icon" alt="User Icon" />
    </div>

    <!-- Login Form -->
    <form method="post" action="login.php">
      <?php echo display_error(); ?>
      <div class="input-group">
        
        <input type="text" id="login" class="fadeIn second" name="email" placeholder="Email" style="margin:auto">
      </div>
      <div class="input-group">
        <input type="password" id="parola" class="fadeIn third" name="password" placeholder="Password" style="margin:auto; margin-top:5px;">
      </div>
      <div class="input-group">
        <input type="submit" class="fadeIn fourth" name="login_btn" style="margin-left: 27%" value="Log In">
      </div>
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="enter_email.php">Forgot Password?</a>
    </div>
    <p>
      Not yet a member? <a href="register.php">Sign up</a>
    </p>
  </div>
  
</div>

<?php
require_once "../layout/footer.php";
?>