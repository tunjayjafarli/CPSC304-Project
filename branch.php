<form method="POST" action="branch.php"> 

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

Echo "<b>LIST OF BRANCHES</b>";
Echo "<br>";

// Update functionality
if (isset($_POST['Update'])) {
	$branchid = $_POST['branchid'];
	$phone = $_POST['phone'];
	$name = $_POST['name'];
	$location = $_POST['location'];

	$sql_update = "update Branch set phone='$phone', name='$name', location='$location' where branchid='$branchid'";
	if (mysqli_query($conn, $sql_update) & $branchid>0) {
		echo "<p style=color:green> Updated the values for the branch: " . $branchid;
	} else {
		echo "<p style=color:red> Please check that you have entered a valid branch id! <br>";
	}	
}

// Delete functionality
if (isset($_POST['Delete'])) {
	$sql = "Select * from Branch";
	$branches = mysqli_query($conn, $sql);

	while ($array=mysqli_fetch_array($branches)) {
		$a = isset($_POST[$array[0]]);
		if ($a>=1) {
			mysqli_query($conn, "delete from Branch where branchid = $array[0]");
			echo "<p style=color:red> Destroyed the branch: ". $array[0];
		}
	}
}

// Select functionality
$sql = "Select * from Branch";
$result = mysqli_query($conn, $sql);

Echo "<Table border=1 class=table>";
Echo "<TR><TD>Branch ID</TD>
		  <TD>Phone</TD>
		  <TD>Name</TD>
		  <TD>Address</TD>
		  <TD><Input type=Submit name='Delete' value='Delete' class='btn btn-danger'></TD></TR>";
if (mysqli_num_rows($result) > 0) {
	while($array = mysqli_fetch_array($result)) {
		echo "<TR><TD> $array[0] </TD>";
		echo 	 "<TD> $array[1] </TD>";
		echo 	 "<TD> $array[2] </TD>";
		echo 	 "<TD> $array[3] </TD>";
		echo     "<TD><Input type=Checkbox name=$array[0]></TD></TR>";
	}
}

Echo "<TR>
		  <TD><Input type = text name = 'branchid'></TD>
		  <TD><Input type = text name = 'phone'></TD>
		  <TD><Input type = text name = 'name'></TD>
		  <TD><Input type = text name = 'location'></TD>
		  <TD><Input type = submit name = 'Update' value = 'Update' class = 'btn btn-warning'></TD></TR>";
Echo "</Table>";

mysqli_close($conn);

echo "<a href=packages.php class='btn btn-primary'> Check Storage </a>"; 

?>
