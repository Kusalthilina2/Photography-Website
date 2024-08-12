<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "malcolmphotography";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['delete'])) {
    $id = $_POST['id'];

    // Delete the record from the database
    $sql = "DELETE FROM wedding WHERE id='$id'";
    
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully.";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$conn->close();