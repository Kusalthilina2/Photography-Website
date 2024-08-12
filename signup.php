<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "malcolmphotography";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$fullname = $_POST['fullname'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$country = $_POST['country'];

$sql = "INSERT INTO client(fullname, email, contact, country)
        VALUES ('$fullname', '$email', '$contact', '$country')";

if ($conn->query($sql) === TRUE) {
    echo "Registration successful!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>