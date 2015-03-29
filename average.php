<?php
Include ("header.php");
?>

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

// The sql query to get the annual sum from DB 
$sql1 = "SELECT SUM(Paid.amount) as annualprofit, Date_.year 
FROM (Paid INNER JOIN Date_ on Paid.issuenumber=Date_.issuenumber)
GROUP BY year";

$loc1 = mysqli_query($conn, $sql1);

//Display the result as a table
if (mysqli_num_rows($loc1) > 0) {
	echo "<table class='table table-striped table-bordered'>
	<TR><TD class='col-md-4'>Annual Profit (CAD) </TD>
	<TD class='col-md-4'>Year</TD></TR>";
	while($array = mysqli_fetch_array($loc1)) {
		echo "<TR><TD class='col-md-4'> $array[0] </TD>";
		echo "<TD class='col-md-4'> $array[1] </TD></TR>";
	}
	echo "</table>";		
}
else {
	echo "<p style=color:red> No orders were made in that year";
}
echo "<br>";

mysqli_close($conn);
?>

<a href="maxmin.php" class='btn btn-primary'> Max-Min </a>

