<link href="style.css" rel="stylesheet" type="text/css">
<br>

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

$year=$_POST["year"]; 

// Select trackingnumber, destination and type from tables Officereceived and Item
$sql = "SELECT OfficeReceived.branchid, COUNT(DAte_.year) AS NumberOfOrders
FROM (Officereceived INNER JOIN Date_ ON Officereceived.issuenumber=Date_.issuenumber)
WHERE Date_.year=$year GROUP BY branchid";

$loc = mysqli_query($conn, $sql);

//Turn off error reporting from mysql
error_reporting(0);


//Display the result as a table
if (mysqli_num_rows($loc) > 0) {
	echo "<table class='table table-striped table-bordered'>
	<TR><TD>Branch ID</TD>
	<TD>Number of Orders </TD>";
	while($array = mysqli_fetch_array($loc)) {
		echo "<TR><TD> $array[0] </TD>";
		echo "<TD> $array[1] </TD>";
	}
	echo "</table>";		
}
else {
	echo "<p style=color:red> No orders were made in that year";
}

//close connection
mysqli_close($conn);

?>

<br>
<form method="POST" action="year.php"> 
	<p style=color:purple>
		<br>	Enter a different year to see the number of orders received in that year:<br>
	</p> 
	<input type="text" name="year">
	<input type="submit" name="GetInfo" class='btn btn-primary'>
</form>
<br>
<a href="employee.php"> Go back to EMPLOYEE</a>
