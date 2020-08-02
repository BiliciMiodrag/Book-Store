<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require '../vendor/autoload.php';
//include "registration-funtctions.php";

// Instantiation and passing `true` enables exceptions
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
      
    $mail->addAddress("bilicimio@yahoo.com");               // Name is optional
    
    $token = bin2hex(random_bytes(50));
    $body="Hi there,click on this <a href=\"http://bookstorephp.com/registration/new_password.php?token=" . $token . "\">link</a> to reset your password on our site</p>";
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Reset your password on BookStore.com';
    $mail->Body    = $body;
    $mail->AltBody = strip_tags($body);

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


