<?php
// Shaansun Contact Form Handler

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Sanitize inputs
    $name    = htmlspecialchars(trim($_POST['name'] ?? ''));
    $email   = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
    $mobile  = htmlspecialchars(trim($_POST['mobile'] ?? ''));
    $message = htmlspecialchars(trim($_POST['message'] ?? ''));

    // Basic validation
    if ($name === '' || $email === '' || $message === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: contact.html?error=1");
        exit;
    }

    // Recipient email
    $to = "info@shaansun.com"; // ✅ messages go to this email

    $subject = "New Contact Form Message from $name";
    $body  = "You have received a new message from the Shaansun Technologies website.\n\n";
    $body .= "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Mobile: $mobile\n\n";
    $body .= "Message:\n$message\n";
    $headers = "From: Shaansun Website <no-reply@shaansun.com>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        header("Location: contact.html?success=1");
    } else {
        header("Location: contact.html?error=1");
    }
    exit;

} else {
    header("Location: contact.html");
    exit;
}
?>
