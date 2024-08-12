<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "malcolmphotography";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $imagePath = "" . $_FILES['image']['name']; // Construct the image path

    // Move uploaded image to the desired directory
    $uploadDirectory = "";
    $targetFile = $uploadDirectory . basename($_FILES["image"]["name"]);

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
        // Update image path in the database
        $sql = "UPDATE wildlife SET name='$name', imagepath='$imagePath' WHERE id='$id'";
        
        if ($conn->query($sql) === TRUE) {
            echo "Image updated successfully.";
        } else {
            echo "Error updating image: " . $conn->error;
        }
    } else {
        echo "Sorry, there was an error uploading your image.";
    }
}

$conn->close();
?>