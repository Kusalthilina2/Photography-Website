<?php
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "malcolmphotography";

    
    $conn = new mysqli($servername, $username, $password, $dbname);

    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM wildlife";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $name = $row['name'];
            $image = $row['imagepath'];
            $imagePath =   $image;

            echo "<h2>$name</h2>";
            echo "<img src='$imagePath' alt='$name' width='300'>";
        }
    } else {
        echo "No images found.";
    }

    $conn->close();
?>