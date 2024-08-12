<?php
require 'PHPMailer-6.8.0/src/Exception.php';
require 'PHPMailer-6.8.0/src/PHPMailer.php';
require 'PHPMailer-6.8.0/src/SMTP.php';

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name= $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    
    $servername = "localhost";
    $username = "root";
    $passwordDb = "";
    $dbname = "malcolmphotography";

    $conn = new mysqli($servername, $username, $passwordDb, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "INSERT INTO contact (Name, Email, Message) VALUES ('$name', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
       
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
try {
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; 
    $mail->SMTPAuth = true;
    $mail->Username = 'malcolomphotography@gmail.com'; 
    $mail->Password = 'lcihympujoqlflah'; 
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
    $mail->Port = 587; 
    
    $email = $_POST['email']; 
    $mail->setFrom('malcolomphotography@gmail.com', 'Malcolm Photography creation');
    $mail->addAddress($email); 

  
    $mail->isHTML(true);
    $mail->Subject = 'About Inquiry Submission';
    $mail->Body = "Your submission has been received and will be carefully reviewed by our team. We appreciate your interest and effort, and we will be in touch with you soon regarding the outcome.";

    $mail->send();
    
    header("Location: home.html");
    exit();
} catch (Exception $e) {
    echo "Error sending email: {$mail->ErrorInfo}";
}

?>
