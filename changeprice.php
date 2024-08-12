<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newName = $_POST["name"];
    $newDescription = $_POST["description"];
    $newPrice = $_POST["price"];
    
    // Perform database update
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "malcolmphotography";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Update the data where the name matches
    $sql = "UPDATE reserve SET Description='$newDescription', Price='$newPrice' WHERE Name='$newName'";
    
    if ($conn->query($sql) === TRUE) {
        echo "Package updated successfully.";
    } else {
        echo "Error updating package: " . $conn->error;
    }

    $conn->close();
}
?>