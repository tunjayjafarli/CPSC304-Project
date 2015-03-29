<?php
Include ("header.php");
?>

<br>
<form method="POST" action="maxmin.php">
	Select the option that you would like to display:
	<TD><select name="Max" id="maxmin" >
		<option value="">Select Projection Option</option>
		<option value = "1">Maximum Annual Profit</option>
		<option value = "2">Minimum Annual Profit</option>
		<td><input type="submit" value= " Display " class='btn btn-default btn-xs'></td>
	</select>
</form>
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

// Turn off Error Reporting for SQL
error_reporting(0);

// The respective sql queries to get the max/min annual profit
$sql = "SELECT SUM(Paid.amount) as annualprofit, Date_.year 
FROM (Paid INNER JOIN Date_ ON Paid.issuenumber=Date_.issuenumber)
GROUP BY year";

$sql1 = "SELECT MAX(annualprofit), year FROM (SELECT SUM(Paid.amount) as annualprofit, Date_.year 		
	FROM (Paid INNER JOIN Date_ ON Paid.issuenumber=Date_.issuenumber)
	GROUP BY year) as HighestProfit";

$sql2 = "SELECT MIN(annualprofit), year FROM (SELECT SUM(Paid.amount) as annualprofit, Date_.year 
	FROM (Paid INNER JOIN Date_ ON Paid.issuenumber=Date_.issuenumber)
	GROUP BY year) as MinimumProfit";

$loc = mysqli_query($conn, $sql);
$loc1 = mysqli_query($conn, $sql1);
$loc2 = mysqli_query($conn, $sql2);

$maxmin = $_POST['Max'];

//Display the max as a table
echo "<br>";
if($maxmin =='1'){
	if (mysqli_num_rows($loc) > 0) {
		echo "<table class='table table-striped table-bordered'>
		<TR><TD class='col-md-4'>Maximum Annual Profit (CAD) </TD>";
		while($array = mysqli_fetch_array($loc1)) {
			echo "<TR><TD class='col-md-4'> $array[0] </TD>";
		}
		echo "</table>";		
	}
	else {
		echo "<p style=color:red> No orders were made in that year";
	}
}

//Display the min as a table
if($maxmin =='2'){
	if (mysqli_num_rows($loc) > 0) {
		echo "<table class='table table-striped table-bordered'>
		<TR><TD class='col-md-4'>Minimum Annual Profit (CAD) </TD>";
		while($array = mysqli_fetch_array($loc2)) {
			echo "<TR><TD class='col-md-4'> $array[0] </TD>";
		}
		echo "</table>";		
	}
	else {
		echo "<p style=color:red> No orders were made in that year";
	}
}

mysqli_close($conn);
?>

<a href="average.php" class='btn btn-primary'> Back To Reports </a>

