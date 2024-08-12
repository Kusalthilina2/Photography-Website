<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "malcolmphotography"; 

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch all data from the database
    $sql = "SELECT Name, Email, Message FROM contact"; // Corrected table name
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Name</th><th>Email</th><th>Message</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["Name"] . "</td>";
            echo "<td>" . $row["Email"] . "</td>";
            echo "<td>" . $row["Message"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No enquiries found.";
    }

    $conn->close();
?>

