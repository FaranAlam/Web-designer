<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    // Replace this email with your actual email address
    $to = "faranalam14203@gmail.com";
    $subject = "New Message from Contact Form";

    $headers = "From: $email" . "\r\n" .
               "Reply-To: $email" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    $mailBody = "Name: $name\n" .
                "Email: $email\n" .
                "Subject: $subject\n" .
                "Message:\n$message";

    // Send the email
    mail($to, $subject, $mailBody, $headers);

    // Redirect or display a thank you message
    header("Location: thank_you.html");
    exit();
}
?>
