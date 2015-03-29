<?php

include ("management.php");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "PostalService";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

//Create Branch Table
$sql = "CREATE TABLE Branch (branchid int PRIMARY KEY, phone varchar(10) NOT NULL, 
	name varchar(30) NOT NULL, location varchar(30) NOT NULL, CHECK (branchid>0))";

//Check if created 
if (mysqli_query($conn, $sql)) {
	echo "Table Branch created successfully";
} else {
	echo "Error creating table: " . mysqli_error($conn);
}
echo "<br>";

//Create Item Table
$sql1 = "CREATE TABLE Item (itemnumber int PRIMARY KEY, size char(1), type varchar(10))";

//Check if created 
if (mysqli_query($conn, $sql1)) {
	echo "Table Item created successfully";
} else {
	echo "Error creating table: " . mysqli_error($conn);
}
echo "<br>";

//Create In_storage Table
$sql2 = "CREATE TABLE In_storage (issuenumber int PRIMARY key, branchid int NOT NULL, 
	FOREIGN KEY (branchid) REFERENCES Branch(branchid) ON DELETE CASCADE)";

//Check if created 
if (mysqli_query($conn, $sql2)) {
	echo "Table In_storage created successfully";
} else {
	echo "Error creating table: " . mysqli_error($conn);
}
echo "<br>";


//Create OfficeReceived Table
$sql4 = "CREATE Table OfficeReceived(issuenumber int PRIMARY KEY, trackingnumber int UNIQUE, destination varchar(30),
	branchid int NOT NULL, itemnumber int UNIQUE, 
	FOREIGN KEY (branchid) REFERENCES Branch(branchid) ON DELETE CASCADE)";

//Check if created 
if (mysqli_query($conn, $sql4)) {
	echo "Table OfficeReceived created successfully";
} else {
	echo "Error creating table: " . mysqli_error($conn);
}
echo "<br>";

//Create HasShipmentMethod Table
$sql5 = "CREATE TABLE HasShipmentMethod (issuenumber int NOT NULL UNIQUE, days int, method varchar(30), 
	FOREIGN KEY (issuenumber) REFERENCES OfficeReceived(issuenumber) ON DELETE CASCADE)";

//Check if created 
if (mysqli_query($conn, $sql5)) {
	echo "Table HasShipmentMethod created successfully";
} else {
	echo "Error creating table: " . mysqli_error($conn);
}
echo "<br>";

//Create Mailed Table 
$sql6 = "CREATE Table Mailed(branchid int NOT NULL, issuenumber int PRIMARY KEY, deliverystatus varchar(20), receiverstatus varchar(20),
	FOREIGN KEY (branchid) REFERENCES Branch(branchid) ON DELETE CASCADE,
	FOREIGN KEY (issuenumber) REFERENCES OfficeReceived(issuenumber) ON DELETE CASCADE)";

//Check if created 
if (mysqli_query($conn, $sql6)) {
	echo "Table Mailed created successfully";
} else {
	echo "Error creating table: " . mysqli_error($conn);
}
echo "<br>";

//Create Date_ table
$sql7 = "CREATE Table Date_(issuenumber int PRIMARY KEY, day int NOT NULL, month varchar(10) NOT NULL, year int NOT NULL,
	FOREIGN KEY (issuenumber) REFERENCES OfficeReceived(issuenumber) ON DELETE CASCADE)";

//Check if created 
if (mysqli_query($conn, $sql7)) {
	echo "Table Date_ created successfully";
} else {
	echo "Error creating table: " . mysqli_error($conn);
}
echo "<br>";

//Create Paid Table
$sql8 = "CREATE Table Paid(receiptnumber int PRIMARY KEY, issuenumber int NOT NULL, amount int, ptype varchar(12), holdername varchar(30),
	cardnumber int(10) UNIQUE, stype varchar(15))";

//Check if created 
if (mysqli_query($conn, $sql8)) {
	echo "Table Paid created successfully";
} else {
	echo "Error creating table: " . mysqli_error($conn);
}
echo "<br>";

//Create login Table
$sql9 = "CREATE TABLE login( id int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY, username varchar(255) NOT NULL, password varchar(255) NOT NULL )";

//Check if created 
if (mysqli_query($conn, $sql9)) {
	echo "Table login created successfully";
} else {
	echo "Error creating table: " . mysqli_error($conn);
}
echo "<br>";



mysqli_close($conn);
?>