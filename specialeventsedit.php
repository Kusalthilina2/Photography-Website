<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "malcolmphotography";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $imagePath = "" . $_FILES['image']['name']; // Construct the image path

    // Move uploaded image to the desired directory
    $uploadDirectory = "";
    $targetFile = $uploadDirectory . basename($_FILES["image"]["name"]);

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
        // Insert image path into the database
        $sql = "INSERT INTO specialevents(name, imagepath) VALUES ('$name', '$imagePath')";
        
        if ($conn->query($sql) === TRUE) {
            echo "Image uploaded and data inserted successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Sorry, there was an error uploading your image.";
    }
}

$conn->close();
?>