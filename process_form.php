<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

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
        // Email sent successfully
        echo "Thank you for your message! We will get back to you soon.";
    } else {
        // Email sending failed
        echo "Oops! Something went wrong and we couldn't send your message.";
    }
} else {
    // If the form is not submitted, redirect to the home page or display an error message
    echo "Form submission error.";
}
?>