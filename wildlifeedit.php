<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "malcolmphotography";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['add'])) {
    
    $imagePath = "" . $_FILES['image']['name']; 

   
    $uploadDirectory = "";
    $targetFile = $uploadDirectory . basename($_FILES["image"]["name"]);

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
       
        $sql = "INSERT INTO wildlife (name, imagepath) VALUES ('$name', '$imagePath')";
        
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