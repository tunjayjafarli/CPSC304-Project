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
echo "<br>";

// Add record(s) to Branch table
$sql = "INSERT INTO login (id, username, password) 
VALUES ('1', 'asifmammadov', 'UBC1');";
$sql .= "INSERT INTO login (id, username, password) 
VALUES ('2', 'tunjayjafarli', 'UBC2');";
$sql .= "INSERT INTO login (id, username, password) 
VALUES ('3', 'tomfung', 'UBC3')";

// Check if added successfully
if (mysqli_multi_query($conn, $sql)) {
	echo "New record(s) successfully added to Branch Table";
} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
echo "<br>";

mysql_close($conn);
?>