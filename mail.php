<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $phone = htmlspecialchars($_POST['phone']);
    $message = htmlspecialchars($_POST['message']);

    if (!$email) {
        echo "Invalid email address.";
        exit;
    }

    // Set your client's email
    $to = "rmts1224@gmail.com"; // 🔁 Replace with your client's actual email

    // Email subject
    $subject = "New Contact Form Submission from $name";

    // Email body content
    $body = "You have received a new message from your website contact form.\n\n";
    $body .= "Full Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Phone: $phone\n";
    $body .= "Message:\n$message\n";

    // Email headers
    $headers = "From: $email";

    // Send the email
    if (mail($to, $subject, $body, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "Message failed to send.";
    }
}
?>
