<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $name = htmlspecialchars($_POST["name"]);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $subject = htmlspecialchars($_POST["subject"]);
    $message = htmlspecialchars($_POST["message"]);

    // Set recipient email address
    $to = "faranalam14203@gmail.com";

    // Build email headers
    $headers = "From: $name <$email>" . "\r\n" .
               "Reply-To: $email" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    // Compose the email message
    $email_message = "Subject: $subject\n\n" .
                     "From: $name\n" .
                     "Email: $email\n\n" .
                     "Message:\n$message";

    // Attempt to send the email
    if (mail($to, $subject, $email_message, $headers)) {
        echo "Thank you for your message! We will get back to you soon.";
    } else {
        echo "Oops! Something went wrong and we couldn't send your message.";
    }
} else {
    echo "Form submission error.";
}
?>
