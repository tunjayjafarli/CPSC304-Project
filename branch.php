<HTML>
<BODY>
<title>Postal Service Database</title>
<FORM>

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

Echo "<Table border=1>";
Echo "<TR><TD>Branch ID</TD>
		  <TD>Phone</TD>
		  <TD>Name</TD>
		  <TD>Address</TD> </TR>";
if (mysqli_num_rows($result) > 0) {
	while($array = mysqli_fetch_array($result)) {
		echo "<TR><TD> $array[0] </TD>";
		echo 	 "<TD> $array[1] </TD>";
		echo 	 "<TD> $array[2] </TD>";
		echo 	 "<TD> $array[3] </TD></TR>";
	}
}

Echo "<TR>
		  <TD><Input type = text name = 'branchid'></TD>
		  <TD><Input type = text name = 'phone'></TD>
		  <TD><Input type = text name = 'name'></TD>
		  <TD><Input type = text name = 'location'></TD>
		  <TD><Input type = submit name = 'Submit'></TD></TR>";
Echo "</Table>";

mysqli_close($conn);

?>

</HTML>
</BODY>
</FORM>