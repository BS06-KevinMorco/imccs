<?php 

$email = $_POST['email'];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../mail/Exception.php';
require '../mail/PHPMailer.php';
require '../mail/SMTP.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'kevchristophermorco@gmail.com';
    $mail->Password   = 'colxxrkcbmvfsvir';                            // SMTP password
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    $mail->setFrom('kevchristophermorco@gmail.com', 'IMCCS');
    $mail->addAddress($email);

    $token = substr(str_shuffle('1234567890QWERTYUIOPASDFGHJKLZXCVBNM'), 0, 10);

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Password Reset';
    $mail->Body    = '<p>Welcome to <b>IMCCS</b>, To reset your password click the button below:</p><br> <a href="http://localhost/capstone/section-pages/forgot-password-change.php?token=' . $token . '" style=" background-color: #800000;border: none;color: white;padding: 10px 10px;text-align: center;text-decoration: none;display: inline-block;font-size: 12px;">Reset password </a>. <br> <p> Happy Learning!.</p>';

    $conn = new mySqli('localhost', 'root', '', 'capstone');

    if ($conn->connect_error) {
        die('Could not connect to the database.');
    }

    $verifyQuery = $conn->query("SELECT * FROM user_tbl WHERE email = '$email'");

    if ($verifyQuery->num_rows) {
        $codeQuery = $conn->query("UPDATE user_tbl  set  token='$token' WHERE email = '$email'");

        $mail->send();

    }
    $conn->close();
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
} 
?>







