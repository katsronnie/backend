<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "katenderonnie045.com"; // Change this to your email
    $subject = "NewRadio5GConsulting Contact form " . $_POST["name"];
    $message = $_POST["message"];
    $headers = "From: " . $_POST["email"];

    if (mail($to, $subject, $message, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "Failed to send.";
    }
}
?>
