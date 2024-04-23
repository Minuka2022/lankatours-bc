<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
?>

<?php

if (isset($_POST['submit'])) {



    $mail = new PHPMailer(true); // Create a new PHPMailer instance

    // SMTP Configuration
    $mail->isSMTP(); // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com'; // Your SMTP server address
    $mail->SMTPAuth = true; // Enable SMTP authentication
    $mail->Username = 'lankatourdriver@gmail.com'; // Your SMTP username
    $mail->Password = 'ocyj ulgo tspo xlkk'; // Your SMTP password
    $mail->SMTPSecure = 'tls'; // Enable TLS encryption; 'ssl' is also possible
    $mail->Port = 587; // TCP port to connect to






    // Set email parameters
    $to = 'info@lankatours.at'; // Replace with your recipient email address
    $subject = 'New Customized Tour Request';

    // Build the email message
    $message = '';

    // Collect and append form data to the message

    // Travel method
$message .= '<p><b>How do you want to travel?</b>: ' . $_POST['travel-method'] . '</p>';

// Accommodation type
$message .= '<p><b>What type of accommodation do you prefer?</b>: ' . $_POST['accommodation-type'] . '</p>';

// Planning progress
$message .= '<p><b>How far along are you with your travel planning?</b>: ' . $_POST['planning-progress'] . '</p>';

    // Languages
    if (!empty($_POST['language'])) {
        $message .= '<p><b>Languages:</b></p>';
        foreach ($_POST['language'] as $value) {
            $message .= '<p>' . $value . '</p>';
        }
    }

    // Other language
    if (!empty($_POST['other-language'])) {
        $message .= '<p><b>Other language:</b>: ' . $_POST['other-language'] . '</p>';
    }

    // Vacation type
    if (!empty($_POST['vacation-type'])) {
        $message .= '<p><b>Type of vacation that I am looking for:</b></p>';
        foreach ($_POST['vacation-type'] as $value) {
            $message .= '<p>' . $value . '</p>';
        }
    }

    // Additional services
    if (!empty($_POST['additional'])) {
        $message .= '<p><b>Additional services that I need:</b></p>';
        foreach ($_POST['additional'] as $value) {
            $message .= '<p>' . $value . '</p>';
        }
    }

    // User message
    if (!empty($_POST['user-message'])) {
        $message .= '<p><b>My additional requirements:</b></p>';
        $message .= '<p>' . $_POST['user-message'] . '</p>';
    }

    // Adults
    $message .= '<p><b>Adult:</b>: ' . $_POST['adults'] . '</p>';

    // Children
    $message .= '<p><b>Children:</b>: ' . $_POST['children'] . '</p>';

    // Start date
    $message .= '<p><b>Start date:</b>: ' . $_POST['start'] . '</p>';

    // End date
    $message .= '<p><b>End date:</b>: ' . $_POST['end'] . '</p>';

    // Flight number
    $message .= '<p><b>Flight number:</b>: ' . $_POST['flight'] . '</p>';

    // Name
    $message .= '<p><b>Name:</b>: ' . $_POST['name'] . '</p>';

    // Email
    $message .= '<p><b>Email:</b>: ' . $_POST['email'] . '</p>';

    // Set the email body and content type
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $message;

    // Add recipient and sender email addresses
    $mail->setFrom($_POST['email'], $_POST['name']);
    $mail->addAddress($to);

    try {
        // Send the email
        if ($mail->send()) {
            echo '<script>window.location.href = "thank_you.html";</script>';
        } else {
            echo "Email could not be sent. Error: " . $mail->ErrorInfo;
        }
    } catch (Exception $e) {
        echo "Email could not be sent. Error: " . $mail->ErrorInfo;
    }
}
?>