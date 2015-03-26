
<HTML>
	<BODY>
		<h1><center>EMPLOYEE</center></h1>
<TABLE border=0 height=10% width=100% bgcolor="lightgrey">
		<TR>
			
		<TD><a href="header.php"> HOME </a></TD>
		<TD><a href="branch.php"> BRANCHES </a></TD>
		<TD><a href="customer.php"> CUSTOMER </a></TD>
		<TD><a href="employee.php"> EMPLOYEE </a></TD>

		</TR> 
</TABLE>

<h2>Shipment Status</h2>
<form method="POST" action="employee.php"> 
	Issue Number: <input type="text" name="issuenumber">
	<input type="submit" name="GetInfo">
</form>
<h2>Check Shipment Information</h2>
<h2>Storage Office Management</h2>

<?php

Include ("header.php");
Echo "This page is for EMPLOYEES ONLY!";

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

if (isset($_GET['Submit'])) {
	$branchid = $_GET['branchid'];
	$phone = $_GET['phone'];
	$name = $_GET['name'];
	$location = $_GET['location'];

	mysqli_query($conn, "insert into Branch value 
		('$branchid', '$phone', '$name', '$location')");
	echo "Values inserted successfully";
}

$sql = "Select * from Branch";
$result = mysqli_query($conn, $sql);

echo "<h2>Send New Item</h2>";

Echo "<b>Item</b>";
Echo "<Table border=1>";
Echo "<TR><TD>Item Number</TD>
		  <TD>Fee</TD>
		  <TD>Size</TD>
		  <TD>Type</TD></TR>";
Echo "<TR>
		  <TD><Input type = text name = 'itemnumber'></TD>
		  <TD><Input type = text name = 'fee'></TD>
		  <TD><Input type = text name = 'size'></TD>
		  <TD><Input type = text name = 'type'></TD></TR>";
Echo "</Table>";

Echo "<b>Shipment</b>";
Echo "<Table border=1>";
Echo "<TR>
		  <TD>Issue Number</TD>
		  <TD>Tracking Number</TD>
		  <TD>Destination</TD>
		  <TD>Branch ID</TD></TR>";
Echo "<TR>
		  <TD><Input type = text name = 'issuenumber'></TD>
		  <TD><Input type = text name = 'trackingnumber'></TD>
		  <TD><Input type = text name = 'destination'></TD>
		  <TD><Input type = text name = 'branchid'></TD></TR>";
Echo "</Table>";

Echo "<b>Shipment Method</b>";
Echo "<Table border=1>";
Echo "<TR>
		  <TD>Duration</TD>
		  <TD>Method</TD></TR>";
Echo "<TR>
		  <TD><Input type = text name = 'duration'></TD>
		  <TD><Input type = text name = 'method'></TD></TR>";
Echo "</Table>";

Echo "<b>Mailing Status</b>";
Echo "<Table border=1>";
Echo "<TR>
		  <TD>Delivery Status</TD>
		  <TD>Reciever Status</TD></TR>";
Echo "<TR>
		  <TD><Input type = text name = 'deliverystatus'></TD>
		  <TD><Input type = text name = 'recieverstatus'></TD></TR>";
Echo "</Table>";

//date arrived or sent
Echo "<b>Date</b>";
Echo "<Table border=1>";
Echo "<TR>
		  <TD>Day</TD>
		  <TD>Month</TD>
		  <TD>Year</TD></TR>";
Echo "<TR>
		  <TD><Input type = text name = 'day'></TD>
		  <TD><Input type = text name = 'month'></TD>
		  <TD><Input type = text name = 'year'></TD></TR>";
Echo "</Table>";

Echo "<b>Payment</b>";
Echo "<Table border=1>";
Echo "<TR>
		  <TD>Receipt Number</TD> 
		  <TD>Amount</TD>
		  <TD>Holder Name</TD>
		  <TD>Card Number</TD>
		  <TD>Paid Type</TD>
		  <TD>Shipment Type</TD></TR>";
Echo "<TR>
		  <TD><Input type = text name = 'receiptnumber'></TD>
		  <TD><Input type = text name = 'amount'></TD>
		  <TD><Input type = text name = 'holdername'></TD>
		  <TD><Input type = text name = 'cardnumber'></TD>
		  <TD><Input type = text name = 'ptype'></TD>
		  <TD><Input type = text name = 'stype'></TD>
		  <TD><Input type = submit name = 'Submit'></TD></TR>";
Echo "</Table>";

mysqli_close($conn);

?>

	</BODY>
</HTML>

