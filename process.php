<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Adjust the path to autoload.php as needed

// Create a new PHPMailer instance
$mail = new PHPMailer();

// Enable debugging (optional, for troubleshooting)
// $mail->SMTPDebug = SMTP::DEBUG_SERVER;

// SMTP Configuration for Gmail
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;
$mail->Username = 'zazaforfeet@gmail.com'; // Your Gmail email address
$mail->Password = 'your_app_password'; // Use the App Password you generated

// Sender and recipient settings
$mail->setFrom('your_email@gmail.com', 'Your Name'); // Use your Gmail email address
$mail->addAddress('zazaforfeet@gmail.com', 'ZazaForFeet');

// Email content
$mail->isHTML(false); // Set to true for HTML email content
$mail->Subject = 'Contact Form Submission'; // Email subject
$mail->Body = 'This is the email content.'; // Your email message

// Send the email
if ($mail->send()) {
    echo 'Email sent successfully';
} else {
    echo 'Email not sent. Error: ' . $mail->ErrorInfo;
}

