<form method="POST" action="branch.php"> 

	<?php
	Include("header.php");

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

	echo "Add Item<br>"; 

// Insert functionality
	if (isset($_POST['Submit'])) {
		$itemnumber = $_POST['itemnumber'];
		$size = $_POST['size'];
		$type = $_POST['type'];
		$issuenumber = $_POST['issuenumber'];
		$trackingnumber = $_POST['trackingnumber'];
		$destination = $_POST['destination'];
		$branchid = $_POST['branchid'];
		$method = $_POST['method'];
		$deliverystatus = $_POST['deliverystatus'];
		$receiverstatus = $_POST['receiverstatus'];
		$day = $_POST['day'];
		$month = $_POST['month'];
		$year = $_POST['year'];
		$receiptnumber = $_POST['receiptnumber'];
		$amount = $_POST['amount'];
		$ptype = $_POST['ptype'];
		$holdername = $_POST['holdername'];
		$cardnumber = $_POST['cardnumber'];
		$stype = $_POST['stype'];

		mysqli_query($conn, "INSERT INTO Item(itemnumber, size, type) 
			VALUES ('$itemnumber', '$size', '$type')");
		echo "1New Item inserted successfully";

		mysqli_query($conn, "INSERT INTO HasShipmentMethod(issuenumber, days, method)
			VALUES ('$issuenumber', '$days', '$method')");
		echo "2Shipment Method added";

		mysqli_query($conn, "INSERT INTO Officereceived(issuenumber, trackingnumber, destination, branchid, itemnumber)
			VALUES ('$issuenumber','$trackingnumber','$destination','$branchid','$itemnumber')");
		echo "3Shipment Method added";

		mysqli_query($conn, "INSERT INTO Mailed(branchid, issuenumber, deliverystatus, receiverstatus)
			VALUES ('$branchid', '$issuenumber','$deliverystatus', '$receiverstatus')");
		echo "4Shipment Method added";

		mysqli_query($conn, "INSERT INTO Date_(issuenumber, day, month, year) 
			VALUES ('$issuenumber', '$day','$month', '$year')");
		echo "5Shipment Method added";

		mysqli_query($conn, "INSERT INTO Paid(receiptnumber, issuenumber, amount, ptype, holdername, cardnumber, stype)
			VALUES ('$receiptnumber', '$issuenumber','$amount', '$ptype', '$holdername', '$cardnumber', '$stype')");
		echo "6New values inserted successfully";
	}

Echo "<TR>
		  <TD><Input type = text name = 'itemnumber' value ='Item Number'></TD>
		  <TD><Input type = text name = 'size'></TD>
		  <TD><Input type = text name = 'type'></TD>
		  <TD><Input type = text name = 'issuenumber'></TD>
		  <TD><Input type = text name = 'trackingnumber'></TD></TR>
		  <TD><Input type = text name = 'destination'></TD>
		  <TD><Input type = text name = 'branchid'></TD>
		  <TD><Input type = text name = 'method'></TD>
		  <TD><Input type = text name = 'deliverystatus'></TD>
		  <TD><Input type = text name = 'receiverstatus'></TD></TR>
		  <TD><Input type = text name = 'day'></TD>
		  <TD><Input type = text name = 'month'></TD>
		  <TD><Input type = text name = 'year'></TD>
		  <TD><Input type = text name = 'receiptnumber'></TD>
		  <TD><Input type = text name = 'amount'></TD></TR>
		  <TD><Input type = text name = 'ptype'></TD>
		  <TD><Input type = text name = 'holdername'></TD>
		  <TD><Input type = text name = 'cardnumber'></TD>
		  <TD><Input type = text name = 'stype'></TD>
		  <TD><Input type = submit name = 'submit'></TD></TR>";

Echo "</Table>";
echo "<br>";
// // Select functionality
// 	$sql = "Select * from Branch";
// 	$result = mysqli_query($conn, $sql);

// 	Echo "<Table border=1 class=table>";
// 	Echo "<TR> <TD>Item Number</TD>
// 	<TD>Size</TD>
// 	<TD>Type</TD>
// 	<TD>Issue Number</TD>
// 	<TD>Tracking Number</TD>
// 	<TD>Destination</TD>
// 	<TD>Branch ID</TD>
// 	<TD>Delivery Status</TD>
// 	<TD>Receiver Status</TD>
// 	<TD>Day </TD>
// 	<TD>Month </TD>
// 	<TD>Year </TD>
// 	<TD>Receipt Number ID</TD>
// 	<TD>Amount</TD>
// 	<TD>Ptype</TD>
// 	<TD>Holder Name</TD>
// 	<TD>Credit Card Number</TD>
// 	<TD>Stype</TD> </TR>";
// 	if (mysqli_num_rows($result) > 0) {
// 		while($array = mysqli_fetch_array($result)) {
// 			echo "<TR><TD> $array[0] </TD>";
// 			echo 	 "<TD> $array[1] </TD>";
// 			echo 	 "<TD> $array[2] </TD>";
// 			echo 	 "<TD> $array[3] </TD></TR>";
// 		}
// 	}

// 	Echo "<TR>
// 	<TD><Input type = text name = 'branchid'></TD>
// 	<TD><Input type = text name = 'phone'></TD>
// 	<TD><Input type = text name = 'name'></TD>
// 	<TD><Input type = text name = 'location'></TD>
// 	<TD><Input type = submit name = 'Submit'></TD></TR>";
// 	Echo "</Table>";

	mysqli_close($conn);

	echo "<a href=packages.php class='btn btn-primary'> Check Storage </a>"; 

	?>
