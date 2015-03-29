	<?php
	Include ("header.php");

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

	?>
