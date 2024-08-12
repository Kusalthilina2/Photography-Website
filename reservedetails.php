<?php
require 'PHPMailer-6.8.0/src/Exception.php';
require 'PHPMailer-6.8.0/src/PHPMailer.php';
require 'PHPMailer-6.8.0/src/SMTP.php';

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "malcolmphotography";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") { 
    // Form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $date = $_POST['date'];
    $address = $_POST['address'];
    $event = $_POST['event'];

    // Insert data into the database
    $sql = "INSERT INTO reserve_details( name, Email, contact, date, address, event) VALUES ('$name', '$email','$contact','$date','$address','$event')";

    if ($conn->query($sql) === TRUE) {
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}


try {
    $mail = new PHPMailer(true);

    // Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // SMTP server
    $mail->SMTPAuth = true;
    $mail->Username = 'malcolomphotography@gmail.com'; // SMTP username (your Gmail address)
    $mail->Password = 'lcihympujoqlflah'; // SMTP password (your Gmail password)
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption
    $mail->Port = 587; // TCP port to connect to

    // Recipients
    $email = $_POST['email']; // Get the email address from the form data
    $mail->setFrom('malcolomphotography@gmail.com', 'Malcolm Photography creation');
    $mail->addAddress($email); // Add recipient email address

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'Details Form Submission';
    $mail->Body = "We're pleased to confirm that we've successfully received your customer information form. Our team will now review the details provided and will be in touch if any further information is needed. Thank you for choosing us.";

    $mail->send();
// Redirect to homepage after successful sign-up
header("Location: home.html");
exit();
} catch (Exception $e) {
echo "Error sending email: {$mail->ErrorInfo}";
}
?>