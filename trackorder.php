<?php
Include ("header.php");
?>

<form method="POST" action="trackorder.php">
	Select the option that you would like to display:
	<TD><select name="Order" id="view" >
		<option value="">Select Projection Option</option>
		<option value = "1">By Destination</option>
		<option value = "2">By Delivery Status</option>
		<option value = "3">By Date</option>
		<td><input type="submit" value= " Display " class='btn btn-default btn-xs'></td>
	</select>

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


// Select trackingnumber, destination and type from tables Officereceived and Item
	error_reporting(0);

	$view = $_POST['Order'];

	if($view == "1"){
		$sql = "SELECT OfficeReceived.trackingnumber, Officereceived.destination, Item.type
		FROM Officereceived INNER JOIN Item
		on Officereceived.itemnumber=Item.itemnumber
		ORDER BY destination";

		$loc = mysqli_query($conn, $sql);

//Display it as a table
		if (mysqli_num_rows($loc) > 0) {
			echo "<table class='table table-striped table-bordered'>";
			echo "<TR><TD>Tracking Number</TD>
			<TD>Destination </TD>
			<TD>Type </TR></TD>";
			while($array = mysqli_fetch_array($loc)) {
				echo "<TR><TD> $array[0] </TD>";
				echo "<TD> $array[1] </TD>";
				echo "<TD> $array[2] </TD>";
			}
			echo "</table>";		

		}

		mysqli_close($conn);
	}

	if($view == "2"){
		$sql = "SELECT Mailed.issuenumber, Mailed.deliverystatus, Mailed.receiverstatus
		FROM Mailed ORDER BY issuenumber";

		$loc = mysqli_query($conn, $sql);

//Display it as a table
		if (mysqli_num_rows($loc) > 0) {
			echo "<table class='table table-striped table-bordered'>";
			echo "<TR><TD>Issue Number</TD>
			<TD>Delivery Status </TD>
			<TD>Receiver Status </TR></TD>";
			while($array = mysqli_fetch_array($loc)) {
				echo "<TR><TD> $array[0] </TD>";
				echo "<TD> $array[1] </TD>";
				echo "<TD> $array[2] </TD>";
			}
			echo "</table>";		

		}
		mysqli_close($conn);
	}

	if($view == "3"){
		$sql = "SELECT * FROM Date_ ORDER BY issuenumber";

		$loc = mysqli_query($conn, $sql);

//Display it as a table
		if (mysqli_num_rows($loc) > 0) {
			echo "<table class='table table-striped table-bordered'>";
			echo "<TR><TD>Issue Number</TD>
			<TD>Day </TD>
			<TD>Month</TD>
			<TD>Year</TD></TR>";
			while($array = mysqli_fetch_array($loc)) {
				echo "<TR><TD> $array[0] </TD>";
				echo "<TD> $array[1] </TD>";
				echo "<TD> $array[2] </TD>";
				echo "<TD> $array[3] </TD>";
			}
			echo "</table>";		

		}
		mysqli_close($conn);
	}

	?>
