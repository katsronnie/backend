<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
if ($_SERVER["REQUEST_METHOD"] == "OPTIONS") {
    exit(0);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Use a valid email address here!
    $to = "katenderonnie045@gmail.com";
    $subject = "NewRadio5GConsulting Contact form " . ($_POST["name"] ?? '');
    $message = $_POST["message"] ?? '';
    $headers = "From: " . ($_POST["email"] ?? '');

    if (mail($to, $subject, $message, $headers)) {
        echo json_encode(["message" => "Message sent successfully!"]);
    } else {
        echo json_encode(["message" => "Failed to send."]);
    }
    exit;
}
echo json_encode(["message" => "Invalid request."]);
?>