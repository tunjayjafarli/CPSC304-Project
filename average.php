
<link href="style.css" rel="stylesheet" type="text/css">
<h1 style="color:red"><center>Postal Service Database</center></h1>
<br>

<br>
<form method="POST" action="average.php"> 
	<p style=color:purple>
		<br>	Enter a different year to see the number of orders received in that year:<br>
	</p> 
	<input type="text" name="year">
	<input type="submit" name="GetInfo" class='btn btn-primary'>
</form>
<br>
<a href="employee.php"> Go back to EMPLOYEE</a>

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

$year=$_POST["year"]; 

// Select trackingnumber, destination and type from tables Officereceived and Item
$sql = "SELECT SUM(Paid.amount), Date_.year AS annualprofit
FROM (Paid INNER JOIN Date_ ON Paid.issuenumber=Date_.issuenumber)
GROUP BY year";

$loc = mysqli_query($conn, $sql);

//Display it as a table
if (mysqli_num_rows($loc) > 0) {
	echo "<table class='table table-striped table-bordered table-striped'>
	<TR><TD>Annual Profit (CAD) </TD>
	<TD>Year</TD></TR>";
	while($array = mysqli_fetch_array($loc)) {
		echo "<TR><TD> $array[0] </TD>";
		echo "<TD> $array[1] </TD></TR>";
	}
	echo "</table>";		
}
else {
	echo "<p style=color:red> No orders were made in that year";
}

mysqli_close($conn);

?>
