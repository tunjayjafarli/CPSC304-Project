<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "company";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

// Create  sql tables

//Create Branch Table
$sql = "CREATE TABLE login( id int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY, username varchar(255) NOT NULL, password varchar(255) NOT NULL )";

if (mysqli_query($conn, $sql)) {
	echo "Table  created successfully";
} else {
	echo "Error creating table: " . mysqli_error($conn);
}
echo "<br>";


mysqli_close($conn);
?>