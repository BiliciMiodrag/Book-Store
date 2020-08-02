<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// connect to database
$db = mysqli_connect('localhost', 'root', '', 'bookstorephp');

$errors   = array(); 

if (isset($_POST['register_btn'])) 
{
	register();
}

if( isset($_POST['email_check'] )&& $_POST['email_check'] == 1) 

{
	$email=$_POST['email'];
	$query=" SELECT email FROM users WHERE email='$email' ";
		$rez=mysqli_query($db, $query);
		if(mysqli_num_rows($rez)>0)
		{
			echo "Email Already Exist";
		}
		else
		{
			
		}

}

function register(){
	// call these variables with the global keyword to make them available in function
	global $db,$errors;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$fname    =  $_POST['fname']; 
	$lname    =  $_POST['lname'];
	$email       =  $_POST['email'];
	$password  =  $_POST['password'];
	$confirmed_passworid  =  $_POST['confirmed_password'];


	// form validation: ensure that the form is correctly filled
	if (empty($fname)) { 
		array_push($errors, "First Name is required"); 
	}
	if (empty($lname)) { 
		array_push($errors, "Last Name is required"); 
	}
	if (empty($email)) { 
		array_push($errors, "Email is required");
	}
	
	if (empty($password)) { 
		array_push($errors, "Password is required"); 
	}

	
	if ($_POST['password']!=$_POST['confirmed_password']) {
		array_push($errors, "The two passwords do not match");
	}
	
	// register user if there are no errors in the form
	if (count($errors) == 0) {
		$password = md5($password);//encrypt the password before saving in the database

		if (isset($_POST['user_type'])) {
			$user_type = $_POST['user_type'];
			$query = "INSERT INTO users (fname,lname, email, user_type, password) 
			VALUES('$fname','$lname', '$email', '$user_type', '$password')";
			mysqli_query($db, $query);
			$_SESSION['success']  = "New user successfully created!!";
			header('location: home.php');
		}else{
			$query = "INSERT INTO users (fname,lname, email, user_type, password) 
			VALUES('$fname','$lname', '$email', 'user', '$password')";
			mysqli_query($db, $query);

			// get id of the created user
			$logged_in_user_id = mysqli_insert_id($db);

			$_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
			$_SESSION['success']  = "You are now logged in";
			header('location: ../index.php');				
		}
	}
}

	// return user array from their id
function getUserById($id){
	global $db;
	$query = "SELECT * FROM users WHERE id=" . $id;
	$result = mysqli_query($db, $query);

	$user = mysqli_fetch_assoc($result);
	return $user;
}

function e($val){
	global $db;
	return mysqli_real_escape_string($db, trim($val));
}

function display_error() {
	global $errors;

	if (count($errors) > 0){
		echo '<div class="error">';
		foreach ($errors as $error){
			echo $error .'<br>';
		}
		echo '</div>';
	}
}
if (isset($_GET['token'])) {
$_SESSION['token']=mysqli_real_escape_string($db,$_GET['token']);
}

function isLoggedIn()
{
	if (isset($_SESSION['user'])) {
		return true;
	}else{
		return false;
	}
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: index.php");
}

if (isset($_POST['login_btn'])) {
	login();
}

function login(){
	global $db,$errors;

	// grap form values
	$email = e($_POST['email']);
	$password = e($_POST['password']);

	// make sure form is filled properly
	if (empty($email)) {
		array_push($errors, "Email is required");
	}
	if (empty($password)) {
		array_push($errors, "Password is required");
	}

	// attempt login if no errors on form
	if (count($errors) == 0) {
		$password = md5($password);

		$query = "SELECT * FROM users WHERE email='$email' AND password='$password' LIMIT 1";
		$results = mysqli_query($db, $query);

		if (mysqli_num_rows($results) == 1) { // user found
			// check if user is admin or user
			$logged_in_user = mysqli_fetch_assoc($results);
			if ($logged_in_user['user_type'] == 'admin') {

				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";
				header('location: ../admin/home.php');		  
			}else{
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";

				header('location: ../index.php');
			}
		}else {
			array_push($errors, "Wrong username/password combination");
		}
	}
}


if (isset($_POST['reset-password'])) {
   

   $emailsend = mysqli_real_escape_string($db, $_POST['email']);
   
  // ensure that the user exists on our system
  $query = "SELECT email FROM users WHERE email='$emailsend'";
  $results = mysqli_query($db, $query);

  if (empty($emailsend)) {
    array_push($errors, "Your email is required");
  }else if(mysqli_num_rows($results) <= 0) {
    array_push($errors, "Sorry, no user exists on our system with that email");
  }
  // generate a unique random token of length 100
  $token = bin2hex(random_bytes(50));

  if (count($errors) == 0) {
    // store token in the password-reset database table against the user's email
    $sql = "INSERT INTO password_resets(email, token) VALUES ('$emailsend', '$token')";
    $results = mysqli_query($db, $sql);

    // Send email to user with the token in a link they can click on
   require '../vendor/autoload.php';

   $mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'ssl://smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'proiectso@gmail.com';                     // SMTP username
    $mail->Password   = 'Parola1!';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('info@bookstore.com', 'BookStore');
      
    $mail->addAddress($emailsend);               // Name is optional
    

    $body="Hi there,click on this <a href=\"http://bookstorephp.com/registration/new_password.php?token=" . $token . "\">link</a> to reset your password on our site</p>";
    

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Reset your password on BookStore.com';
    $mail->Body    = $body;
    //$mail->AltBody = strip_tags($body);

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


    header('location: pending.php?email=' . $emailsend);
  }
}

// ENTER A NEW PASSWORD
if (isset($_POST['new_password'])) {
  $new_pass = mysqli_real_escape_string($db, $_POST['new_pass']);
  $new_pass_c = mysqli_real_escape_string($db, $_POST['new_pass_c']);

  // Grab to token that came from the email link
   $token = $_SESSION['token'];
  if (empty($new_pass) || empty($new_pass_c)) array_push($errors, "Password is required");
  if ($new_pass !== $new_pass_c) array_push($errors, "Password do not match");
  if (count($errors) == 0) {
    // select email address of user from the password_reset table 
    $sql = "SELECT email FROM password_resets WHERE token='$token' LIMIT 1";
    $results = mysqli_query($db, $sql);
    $emailsend = mysqli_fetch_assoc($results)['email'];

    if ($emailsend) {
      $new_pass = md5($new_pass);
      $sql = "UPDATE users SET password='$new_pass' WHERE email='$emailsend'";
      $results = mysqli_query($db, $sql);
      header('location: ../index.php');
    }
  }
}

if (isset($_POST['update_btn'])) 
{
	updateprofile();
}

function updateprofile()
{
	global $db,$errors;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$fname    =  e($_POST['fname']); 
	$lname    =  e($_POST['lname']);
	$email       =  e($_POST['email']);
	$adress    =  e($_POST['adress']);
	$phone    =  e($_POST['phone']);
	$city    =  e($_POST['city']);
	$zip    =  e($_POST['zip']);
	$country    = e($_POST['country']);    
	$id=$_SESSION['user']['id'];

	// form validation: ensure that the form is correctly filled
	if (empty($fname)) { 
		array_push($errors, "First Name is required"); 
	}
	if (empty($lname)) { 
		array_push($errors, "Last Name is required"); 
	}
	if (empty($email)) { 
		array_push($errors, "Email is required");
	}
	
	if (count($errors) == 0) {

			$query = "UPDATE users SET fname='$fname',lname='$lname',email= '$email',adress='$adress',phone='$phone',city='$city',zip_code='$zip',country='$country'  WHERE id='$id'";
			if(mysqli_query($db, $query))
				{
					echo "Success";
				}
			return "success";

			//$_SESSION['success']  = "Data was updated successfully!";

			//echo "fname:" .$fname."</br>";
			//header('location: myprofile.php');
	}
}


function isAdmin()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
		return true;
	}else{
		return false;
	}
}


?>