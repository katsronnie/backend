<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

if ($_SERVER["REQUEST_METHOD"] == "OPTIONS") {
    // CORS preflight, no response body needed
    exit(0);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // ... handle your form and mail logic here ...
    // Example:
    $to = "katenderonnie045@gmail.com";
    $subject = "NewRadio5GConsulting Contact form " . ($_POST["name"] ?? '');
    $message = $_POST["message"] ?? '';
    $headers = "From: katenderonnie045@gmail.com\r\nReply-To: " . ($_POST["email"] ?? '');

    if (mail($to, $subject, $message, $headers)) {
        echo json_encode(["message" => "Message sent successfully!"]);
    } else {
        echo json_encode(["message" => "Failed to send."]);
    }
    exit;
}

// For all other methods (like GET)
echo json_encode(["message" => "This endpoint is for POST requests only."]);
?>