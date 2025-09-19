<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

if ($_SERVER["REQUEST_METHOD"] === "OPTIONS") exit(0);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Make sure PHPMailer is installed via composer

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $messageContent = $_POST['message'] ?? '';

    $mail = new PHPMailer(true);

    try {
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = getenv('MAIL_USER'); // Set in Render Env
        $mail->Password   = getenv('MAIL_PASS'); // Gmail App Password
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        // Recipients
        $mail->setFrom($email, $name);
        $mail->addAddress(getenv('MAIL_USER')); // Your inbox

        // Content
        $mail->Subject = "NewRadio5GConsulting Contact form: $name";
        $mail->Body    = $messageContent;

        $mail->send();
        echo json_encode(["message" => "Message sent successfully!"]);
    } catch (Exception $e) {
        echo json_encode(["message" => "Failed to send: " . $mail->ErrorInfo]);
    }
}
?>
