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
echo "<br>";

// Add record(s) to Branch table
$sql = "INSERT INTO Branch (branchid, phone, name, location) 
VALUES ('100', '1002223344', 'UBC', 'Vancouver')";

// Check if added successfully
if (mysqli_query($conn, $sql)) {
	echo "New record(s) successfully added to Branch Table";
} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
echo "<br>";

$sql1 = "INSERT INTO Branch(branchid, phone, name, location)
VALUES ('102', '1012223344', 'Downtown', 'Vancouver DT')";

// Check if added successfully
if (mysqli_query($conn, $sql1)) {
	echo "New record(s) successfully added to Branch Table";
} else {
	echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
}
echo "<br>";

$sql2 = "INSERT INTO Branch(branchid, phone, name, location)
VALUES ('103', '1031112233', 'Burnaby', 'Burnaby')";

// Check if added successfully
if (mysqli_query($conn, $sql2)) {
	echo "New record(s) successfully added to Branch Table";
} else {
	echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
}
echo "<br>";

$sql3 = "INSERT INTO Branch(branchid, phone, name, location)
VALUES ('104', '1045554433', 'Richmond', 'Richmond')";

// Check if added successfully
if (mysqli_query($conn, $sql3)) {
	echo "New record(s) successfully added to Branch Table";
} else {
	echo "Error: " . $sql3 . "<br>" . mysqli_error($conn);
}
echo "<br>";

$sql4 = "INSERT INTO Branch(branchid, phone, name, location)
VALUES ('105', '1053334466', 'North Van', 'North Vancouver')";

// Check if added successfully
if (mysqli_query($conn, $sql4)) {
	echo "New record(s) successfully added to Branch Table";
} else {
	echo "Error: " . $sql4 . "<br>" . mysqli_error($conn);
}
echo "<br>";

// Add record to Item table
$sql5 = "INSERT INTO Item(itemnumber, size, type) VALUES ('1', 'S', 'Letter')";

// Check if added successfully
if (mysqli_query($conn, $sql5)) {
	echo "New record(s) successfully added to Item Table";
} else {
	echo "Error: " . $sql5 . "<br>" . mysqli_error($conn);
}
echo "<br>";

$sql6 = "INSERT INTO Item(itemnumber, size, type) VALUES ('2', 'L', 'Package')";

// Check if added successfully
if (mysqli_query($conn, $sql6)) {
	echo "New record(s) successfully added to Item Table";
} else {
	echo "Error: " . $sql6 . "<br>" . mysqli_error($conn);
}
echo "<br>";

$sql7 = "INSERT INTO Item(itemnumber, size, type) VALUES ('3', 'M', 'Package')";

// Check if added successfully
if (mysqli_query($conn, $sql7)) {
	echo "New record(s) successfully added to Item Table";
} else {
	echo "Error: " . $sql7 . "<br>" . mysqli_error($conn);
}
echo "<br>";

$sql8 = "INSERT INTO Item(itemnumber, size, type) VALUES ('4', 'S', 'Letter')";

// Check if added successfully
if (mysqli_query($conn, $sql8)) {
	echo "New record(s) successfully added to Item Table";
} else {
	echo "Error: " . $sql8 . "<br>" . mysqli_error($conn);
}
echo "<br>";

$sql9 = "INSERT INTO Item(itemnumber, size, type) VALUES ('5', 'L', 'Package')";

// Check if added successfully
if (mysqli_query($conn, $sql9)) {
	echo "New record(s) successfully added to Item Table";
} else {
	echo "Error: " . $sql9 . "<br>" . mysqli_error($conn);
}
echo "<br>";

// Add record to In_storage table
$sql10 = "INSERT INTO In_storage(itemnumber, branchid) VALUES ('1', '103')";

// Check if added successfully
if (mysqli_query($conn, $sql10)) {
	echo "New record(s) successfully added to In_storage Table";
} else {
	echo "Error: " . $sql10 . "<br>" . mysqli_error($conn);
}
echo "<br>";

$sql11 = "INSERT INTO In_storage(itemnumber, branchid) VALUES ('2', '103')";

// Check if added successfully
if (mysqli_query($conn, $sql11)) {
	echo "New record(s) successfully added to In_storage Table";
} else {
	echo "Error: " . $sql11 . "<br>" . mysqli_error($conn);
}
echo "<br>";


// Add record to Officereceived table
$sql12 = "INSERT INTO Officereceived(issuenumber, trackingnumber, destination, branchid, itemnumber)
VALUES ('11','1001','Baku, Azerbaijan','100','1')";

// Check if added successfully
if (mysqli_query($conn, $sql12)) {
	echo "New record(s) successfully added to Officereceived Table";
} else {
	echo "Error: " . $sql12 . "<br>" . mysqli_error($conn);
}
echo "<br>";

$sql13 = "INSERT INTO Officereceived(issuenumber, trackingnumber, destination, branchid, itemnumber)
VALUES ('22','2002','Toronto, Canada','102','2')";

// Check if added successfully
if (mysqli_query($conn, $sql13)) {
	echo "New record(s) successfully added to Officereceived Table";
} else {
	echo "Error: " . $sql13 . "<br>" . mysqli_error($conn);
}
echo "<br>";


$sql14 = "INSERT INTO Officereceived(issuenumber, trackingnumber, destination, branchid, itemnumber)
VALUES ('33','3003','California, US','100','3')";

// Check if added successfully
if (mysqli_query($conn, $sql14)) {
	echo "New record(s) successfully added to Officereceived Table";
} else {
	echo "Error: " . $sql14 . "<br>" . mysqli_error($conn);
}
echo "<br>";


$sql15 = "INSERT INTO Officereceived(issuenumber, trackingnumber, destination, branchid, itemnumber)
VALUES ('44','4004','Ottawa, CA','104','4')";

// Check if added successfully
if (mysqli_query($conn, $sql15)) {
	echo "New record(s) successfully added to Officereceived Table";
} else {
	echo "Error: " . $sql15 . "<br>" . mysqli_error($conn);
}
echo "<br>";


$sql16 = "INSERT INTO Officereceived(issuenumber, trackingnumber, destination, branchid, itemnumber)
VALUES ('55','5005','London, UK','105','5')";

// Check if added successfully
if (mysqli_query($conn, $sql16)) {
	echo "New record(s) successfully added to Officereceived Table";
} else {
	echo "Error: " . $sql16 . "<br>" . mysqli_error($conn);
}
echo "<br>";


// Add record to HasShipmentMethod table
$sql17 = "INSERT INTO HasShipmentMethod(issuenumber, days, method)
VALUES ('11' ,'15', 'regular')";

// Check if added successfully
if (mysqli_query($conn, $sql17)) {
	echo "New record(s) successfully added to HasShipmentMethod Table";
} else {
	echo "Error: " . $sql17 . "<br>" . mysqli_error($conn);
}
echo "<br>";

$sql18 = "INSERT INTO HasShipmentMethod(issuenumber, days, method)
VALUES ('22', '15', 'regular')";

// Check if added successfully
if (mysqli_query($conn, $sql18)) {
	echo "New record(s) successfully added to HasShipmentMethod Table";
} else {
	echo "Error: " . $sql18 . "<br>" . mysqli_error($conn);
}
echo "<br>";

$sql19 = "INSERT INTO HasShipmentMethod(issuenumber, days, method)
VALUES ('33', '3', 'express')";

// Check if added successfully
if (mysqli_query($conn, $sql19)) {
	echo "New record(s) successfully added to HasShipmentMethod Table";
} else {
	echo "Error: " . $sql19 . "<br>" . mysqli_error($conn);
}
echo "<br>";

$sql20 = "INSERT INTO HasShipmentMethod(issuenumber, days, method)
VALUES ('44', '5', 'regular')";

// Check if added successfully
if (mysqli_query($conn, $sql20)) {
	echo "New record(s) successfully added to HasShipmentMethod Table";
} else {
	echo "Error: " . $sql20 . "<br>" . mysqli_error($conn);
}
echo "<br>";

$sql21 = "INSERT INTO HasShipmentMethod(issuenumber, days, method)
VALUES ('55', '6', 'express')";

// Check if added successfully
if (mysqli_query($conn, $sql21)) {
	echo "New record(s) successfully added to HasShipmentMethod Table";
} else {
	echo "Error: " . $sql21 . "<br>" . mysqli_error($conn);
}
echo "<br>";


// Add record to Mailed table
$sql22 = "INSERT INTO Mailed(branchid, issuenumber, deliverystatus, receiverstatus)
VALUES ('103', '11','Waiting', 'Not Delievered')";

// Check if added successfully 
if (mysqli_query($conn, $sql22)) {
	echo "New record(s) successfully added to Mailed Table";
} else {
	echo "Error: " . $sql22 . "<br>" . mysqli_error($conn);
}
echo "<br>";

$sql23 = "INSERT INTO Mailed(branchid, issuenumber, deliverystatus, receiverstatus)
VALUES ('103', '22','Sent', 'Not Delievered')";

// Check if added successfully 
if (mysqli_query($conn, $sql23)) {
	echo "New record(s) successfully added to Mailed Table";
} else {
	echo "Error: " . $sql23 . "<br>" . mysqli_error($conn);
}
echo "<br>";

$sql24 = "INSERT INTO Mailed(branchid, issuenumber, deliverystatus, receiverstatus)
VALUES ('102', '33','Sent', 'Delievered')";

// Check if added successfully 
if (mysqli_query($conn, $sql24)) {
	echo "New record(s) successfully added to Mailed Table";
} else {
	echo "Error: " . $sql24 . "<br>" . mysqli_error($conn);
}
echo "<br>";

$sql25 = "INSERT INTO Mailed(branchid, issuenumber, deliverystatus, receiverstatus)
VALUES ('104', '44','Sent', 'Delievered')";

// Check if added successfully 
if (mysqli_query($conn, $sql25)) {
	echo "New record(s) successfully added to Mailed Table";
} else {
	echo "Error: " . $sql25 . "<br>" . mysqli_error($conn);
}
echo "<br>";

$sql26 = "INSERT INTO Mailed(branchid, issuenumber, deliverystatus, receiverstatus)
VALUES ('105', '55','Waiting', 'Not Delievered')";

// Check if added successfully 
if (mysqli_query($conn, $sql26)) {
	echo "New record(s) successfully added to Mailed Table";
} else {
	echo "Error: " . $sql26 . "<br>" . mysqli_error($conn);
}
echo "<br>";


// Add record to Date_ table
$sql27 = "INSERT INTO Date_(issuenumber, day, month, year) VALUES ('11', '23','March', '2015')";

// Check if added successfully 
if (mysqli_query($conn, $sql27)) {
	echo "New record(s) successfully added to Date_ Table";
} else {
	echo "Error: " . $sql27 . "<br>" . mysqli_error($conn);
}
echo "<br>";

$sql28 = "INSERT INTO Date_(issuenumber, day, month, year) VALUES ('22', '24','February', '2015')";

// Check if added successfully 
if (mysqli_query($conn, $sql28)) {
	echo "New record(s) successfully added to Date_ Table";
} else {
	echo "Error: " . $sql28 . "<br>" . mysqli_error($conn);
}
echo "<br>";

$sql29 = "INSERT INTO Date_(issuenumber, day, month, year) VALUES ('33', '10','January', '2014')";

// Check if added successfully 
if (mysqli_query($conn, $sql29)) {
	echo "New record(s) successfully added to Date_ Table";
} else {
	echo "Error: " . $sql29 . "<br>" . mysqli_error($conn);
}
echo "<br>";

$sql30 = "INSERT INTO Date_(issuenumber, day, month, year) VALUES ('44', '1','October', '2014')";

// Check if added successfully 
if (mysqli_query($conn, $sql30)) {
	echo "New record(s) successfully added to Date_ Table";
} else {
	echo "Error: " . $sql30 . "<br>" . mysqli_error($conn);
}
echo "<br>";

$sql31 = "INSERT INTO Date_(issuenumber, day, month, year) VALUES ('55', '24','March', '2015')";

// Check if added successfully 
if (mysqli_query($conn, $sql31)) {
	echo "New record(s) successfully added to Date_ Table";
} else {
	echo "Error: " . $sql31 . "<br>" . mysqli_error($conn);
}
echo "<br>";


// Add record to Paid table
$sql32 = "INSERT INTO Paid(receiptnumber, issuenumber, amount, ptype, holdername, cardnumber, stype)
VALUES ('1111', '11','100', 'Cash', 'NULL', 'NULL', 'NULL')";

// Check if added successfully 
if (mysqli_query($conn, $sql32)) {
	echo "New record(s) successfully added to Paid Table";
} else {
	echo "Error: " . $sql32 . "<br>" . mysqli_error($conn);
}
echo "<br>";

$sql33 ="INSERT INTO Paid(receiptnumber, issuenumber, amount, ptype, holdername, cardnumber, stype)
VALUES ('1112', '22','10', 'Cash', 'NULL', '-1111111111', 'NULL')";

// Check if added successfully 
if (mysqli_query($conn, $sql33)) {
	echo "New record(s) successfully added to Paid Table";
} else {
	echo "Error: " . $sql33 . "<br>" . mysqli_error($conn);
}
echo "<br>";

$sql34 ="INSERT INTO Paid(receiptnumber, issuenumber, amount, ptype, holdername, cardnumber, stype)
VALUES ('1113', '33','200', 'Credit Card', 'Asif Mammadov', '1111222233', 'NULL')";

// Check if added successfully 
if (mysqli_query($conn, $sql34)) {
	echo "New record(s) successfully added to Paid Table";
} else {
	echo "Error: " . $sql34 . "<br>" . mysqli_error($conn);
}
echo "<br>";


$sql35 ="INSERT INTO Paid(receiptnumber, issuenumber, amount, ptype, holdername, cardnumber, stype)
VALUES ('1114', '44','12', 'stamp', 'Asif Mammadov', '-0000111122', 'international')";

// Check if added successfully 
if (mysqli_query($conn, $sql35)) {
	echo "New record(s) successfully added to Paid Table";
} else {
	echo "Error: " . $sql35 . "<br>" . mysqli_error($conn);
}
echo "<br>";

$sql36 ="INSERT INTO Paid(receiptnumber, issuenumber, amount, ptype, holdername, cardnumber, stype)
VALUES ('1115', '55','150', 'Credit Card', 'Tunjay Jafarli', '1110222233', 'NULL')";

// Check if added successfully 
if (mysqli_query($conn, $sql36)) {
	echo "New record(s) successfully added to Paid Table";
} else {
	echo "Error: " . $sql36 . "<br>" . mysqli_error($conn);
}
echo "<br>";


// Add record(s) to login table
$sql37 = "INSERT INTO login (id, username, password) VALUES ('1', 'asifmammadov', 'UBC1')";

// Check if added successfully
if (mysqli_query($conn, $sql37)) {
	echo "New record(s) successfully added to login Table";
} else {
	echo "Error: " . $sql37 . "<br>" . mysqli_error($conn);
}
echo "<br>";

// Add record(s) to login table
$sql38 = "INSERT INTO login (id, username, password) VALUES ('2', 'tunjayjafarli', 'UBC2')";

// Check if added successfully
if (mysqli_query($conn, $sql38)) {
	echo "New record(s) successfully added to login Table";
} else {
	echo "Error: " . $sql38 . "<br>" . mysqli_error($conn);
}

echo "<br>";

// Add record(s) to login table
$sql39 = "INSERT INTO login (id, username, password) VALUES ('3', 'tomfung', 'UBC3')";

// Check if added successfully
if (mysqli_query($conn, $sql39)) {
	echo "New record(s) successfully added to login Table";
} else {
	echo "Error: " . $sql39 . "<br>" . mysqli_error($conn);
}

echo "<br>";

mysqli_close($conn);
?>
