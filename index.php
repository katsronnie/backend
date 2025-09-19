<?php
// Allow CORS so your React frontend can call this endpoint
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

// Handle preflight requests
if ($_SERVER["REQUEST_METHOD"] === "OPTIONS") exit(0);

// Include PHPMailer manually
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Only handle POST requests
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
        $mail->Username   = getenv('MAIL_USER'); // Set this in Render Environment Variables
        $mail->Password   = getenv('MAIL_PASS'); // Gmail App Password
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        // Email sender and recipient
        $mail->setFrom($email, $name);
        $mail->addAddress(getenv('MAIL_USER')); // Your inbox

        // Email subject and body
        $mail->Subject = "NewRadio5GConsulting Contact form: $name";
        $mail->Body    = $messageContent;

        // Send email
        $mail->send();
        echo json_encode(["message" => "Message sent successfully!"]);
    } catch (Exception $e) {
        echo json_encode(["message" => "Failed to send: " . $mail->ErrorInfo]);
    }
} else {
    // Non-POST requests
    echo json_encode(["message" => "This endpoint only accepts POST requests."]);
}
?>
