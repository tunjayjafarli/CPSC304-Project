
<link href="style.css" rel="stylesheet" type="text/css">
<h1 style="color:red"><center>Postal Service Database</center></h1>
<br>

<br>
<!-- <form method="POST" action="average.php"> 
	<p style=color:purple>
		<br>	Enter a different year to see the number of orders received in that year:<br>
	</p> 
	<input type="text" name="year">
	<input type="submit" name="GetInfo" class='btn btn-primary'>
</form>
<br> -->
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


// Select trackingnumber, destination and type from tables Officereceived and Item
$sql = " SELECT MAX(annualprofit), year FROM (SELECT SUM(Paid.amount) as annualprofit, Date_.year 
	FROM (Paid INNER JOIN Date_ ON Paid.issuenumber=Date_.issuenumber)
	GROUP BY year) as HighestProfit";

$sql1 = "SELECT SUM(Paid.amount) as annualprofit, Date_.year 
FROM (Paid INNER JOIN Date_ on Paid.issuenumber=Date_.issuenumber)
GROUP BY year";

$loc = mysqli_query($conn, $sql);
$loc1 = mysqli_query($conn, $sql1);


//Display it as a table

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
if (mysqli_num_rows($loc) > 0) {
	echo "<table class='table table-striped table-bordered'>
	<TR><TD class='col-md-4'>Max Annual Profit (CAD) </TD>
	<TD class='col-md-4'>Year</TD></TR>";
	while($array = mysqli_fetch_array($loc)) {
		echo "<TR><TD class='col-md-4'> $array[0] </TD>";
		echo "<TD class='col-md-4'> $array[1] </TD></TR>";
	}
	echo "</table>";		
}
else {
	echo "<p style=color:red> No orders were made in that year";
}

mysqli_close($conn);

?>
