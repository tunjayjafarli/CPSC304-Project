<form method="POST" action="packages.php"> 

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

Echo "<b>PACKAGES IN STORAGE</b>";
Echo "<br>";

// Insert functionality
if (isset($_POST['Submit'])) {
	$issuenumber = $_POST['issuenumber'];
	$branchid = $_POST['branchid'];

	mysqli_query($conn, "insert into In_storage value 
		('$issuenumber' ,'$branchid')");
	echo "<p style=color:green> New values inserted successfully<br>";
}

// Delete functionality
if (isset($_POST['Delete'])) {
	$sql = "Select * from In_storage";
	$packages = mysqli_query($conn, $sql);

	while ($array=mysqli_fetch_array($packages)) {
		$a = isset($_POST[$array[0]]);
		if ($a>=1) {
			mysqli_query($conn, "delete from In_storage where issuenumber = $array[0]");
			echo "<p style=color:red> Removed the package with issue number: ". $array[0];
			echo "<br>";
		}
	}
}

// Select functionality
$sql = "Select * from In_storage";
$packages = mysqli_query($conn, $sql);

Echo "<Table border=1 class=table>";
Echo "<TR><TD>Issue Number</TD>
		  <TD>Branch ID</TD>
		  <TD><Input type=Submit name='Delete' value='Remove from Storage' class='btn btn-danger'></TD></TR>";

if (mysqli_num_rows($packages) > 0) {
	while($array = mysqli_fetch_array($packages)) {
		echo "<TR><TD> $array[0] </TD>";
		echo 	 "<TD> $array[1] </TD>";
		echo     "<TD><Input type=Checkbox name=$array[0]></TD></TR>";
	}
}

Echo "<TR>
		  <TD><Input type = text name = 'issuenumber'></TD>
		  <TD><Input type = text name = 'branchid'></TD>
		  <TD><Input type = submit name = 'Submit' value='Add to Storage' class='btn btn-success'></TD></TR>";
Echo "</Table>";

mysqli_close($conn);

echo "<a href=branch.php class='btn btn-primary'> BRANCHES </a>";

?>
