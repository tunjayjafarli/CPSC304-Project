<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create tables
$sql = "CREATE TABLE Branch (branchid INT(6) PRIMARY KEY, phone INT(10), name VARCHAR(30) NOT NULL, location VARCHAR(30) NOT NULL)";

// Execute multiple queries
if (mysqli_multi_query($conn, $sql)) {
    echo "New tables created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>