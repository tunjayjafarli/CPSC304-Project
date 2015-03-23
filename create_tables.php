<?php
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

// Create  sql tables

//Branch Tabel
$sql = "CREATE TABLE Branch (branchid int PRIMARY KEY, phone int(10) NOT NULL, 
	name varchar(30) NOT NULL, 
	location varchar(30) NOT NULL)";

if (mysqli_query($conn, $sql)) {
	echo "Table Branch created successfully";
} else {
	echo "Error creating table: " . mysqli_error($conn);
}
echo "<br>";

// Item Table
$sql1 = "CREATE TABLE Item (itemnumber int PRIMARY KEY, fee DOUBLE NOT NULL, size char(1), type varchar(10))";

if (mysqli_query($conn, $sql1)) {
	echo "Table Item created successfully";
} else {
	echo "Error creating table: " . mysqli_error($conn);
}
echo "<br>";

// Packages Table
$sql2 = "CREATE TABLE Packages (itemnumber int PRIMARY key, branchid int NOT NULL, 
	FOREIGN KEY (branchid) REFERENCES Branch(branchid))";

if (mysqli_query($conn, $sql2)) {
	echo "Table Packages created successfully";
} else {
	echo "Error creating table: " . mysqli_error($conn);
}
echo "<br>";

// Shipment table
$sql3 = "CREATE TABLE Shipment(issuenumber int PRIMARY KEY , trackingnumber int, destination varchar(30),
	branchid int, itemnumber int, 
	UNIQUE (trackingnumber),
	FOREIGN KEY(branchid) REFERENCES Branch(branchid),
	FOREIGN KEY(itemnumber) REFERENCES Item(itemnumber))"; 

if (mysqli_query($conn, $sql3)) {
	echo "Table Shipment created successfully";
} else {
	echo "Error creating table: " . mysqli_error($conn);
}
echo "<br>";

//HasShipmentMethod Table
$sql4 = "CREATE TABLE HasShipmentMethod (issuenumber int PRIMARY KEY , fee DOUBLE NOT NULL, 
	duration varchar(30), method varchar(30), 
	FOREIGN KEY (issuenumber) REFERENCES Shipment(issuenumber))";

if (mysqli_query($conn, $sql4)) {
	echo "Table HasShipmentMethod created successfully";
} else {
	echo "Error creating table: " . mysqli_error($conn);
}
echo "<br>";

//OfficeReceived Table
$sql5 = "CREATE Table OfficeReceived(branchid int PRIMARY key, issuenumber int NOT NULL,
	FOREIGN KEY (issuenumber) REFERENCES Shipment(issuenumber))";
if (mysqli_query($conn, $sql5)) {
	echo "Table OfficeReceived created successfully";
} else {
	echo "Error creating table: " . mysqli_error($conn);
}
echo "<br>";

//Mailed Table 
$sql6 = "CREATE Table Mailed(branchid int NOT NULL, issuenumber int PRIMARY KEY, deliverystatus varchar(10), receiverstatus varchar(10),
	FOREIGN KEY (branchid) REFERENCES Branch(branchid),
	FOREIGN KEY (issuenumber) REFERENCES Shipment(issuenumber))";

if (mysqli_query($conn, $sql6)) {
	echo "Table Mailed created successfully";
} else {
	echo "Error creating table: " . mysqli_error($conn);
}
echo "<br>";

//Date_ table
$sql7 = "CREATE Table Date_(issuenumber int PRIMARY KEY, day int NOT NULL, month varchar(10) NOT NULL, year int NOT NULL,
	FOREIGN KEY (issuenumber) REFERENCES Shipment(issuenumber))";

if (mysqli_query($conn, $sql7)) {
	echo "Table Date_ created successfully";
} else {
	echo "Error creating table: " . mysqli_error($conn);
}
echo "<br>";

//Paid Table
$sql8 = "CREATE Table Paid(receiptnumber int PRIMARY KEY, issuenumber int NOT NULL, amount int, ptype varchar(12), holdername varchar(30),
	cardnumber int UNIQUE, stype varchar(10))";

if (mysqli_query($conn, $sql8)) {
	echo "Table Paid created successfully";
} else {
	echo "Error creating table: " . mysqli_error($conn);
}
echo "<br>";


mysqli_close($conn);
?>