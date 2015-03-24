
<?php
include ("header.php");
?>

<h1><center> CUSTOMER </center></h1>

<TABLE border=0 height=10% width=100% bgcolor="lightgrey">
		<TR>
			
		<TD><a href="header.php"> HOME </a></TD>
		<TD><a href="branch.php"> BRANCHES </a></TD>
		<TD><a href="customer.php"> CUSTOMER </a></TD>
		<TD><a href="employee.php"> EMPLOYEE </a></TD>

		</TR> 
</TABLE>
<h2>Delivery Status</h2>
<form method="POST" action="customer.php"> 
	Issue Number: <input type="text" name="issuenumber">
	<input type="submit" name="GetInfo">
</form>
<h2> Change Delivery Method </h2>
<form method="POST" action="customer.php"> 
	Issue Number: <input type="text" name="issuenumber">
	<input type="radio" name="method" value="regular">Regular
   	<input type="radio" name="method" value="express">Express
	<input type="submit" name="ChangeDeliveryMethod">
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

$number = 0;

if(array_key_exists('GetInfo', $_POST)){

	if(is_int($number)){

		$number = htmlspecialchars($_POST["issuenumber"]);
	
		$sql = "select Mailed.issuenumber, 
				Mailed.deliverystatus, 
				Mailed.receiverstatus, 
				HasShipmentMethod.duration
				from Mailed
				inner join HasShipmentMethod
				on Mailed.issuenumber = HasShipmentMethod.issuenumber
				where Mailed.issuenumber = $number";
		$result = mysqli_query($conn, $sql);
		if(is_object($result)){

			Echo "<Table border = 1>";
			Echo "<TR><TD>Issue Number</TD>
				  <TD>Delivery Status</TD>
				  <TD>Reciever Status</TD>
				  <TD>Duration</TD> </TR>";
			if (mysqli_num_rows($result) > 0) {
				while($array = mysqli_fetch_array($result)) {
					echo "<TR><TD> $array[0] </TD>";
					echo 	 "<TD> $array[1] </TD>";
					echo 	 "<TD> $array[2] </TD>";
					echo 	 "<TD> $array[3] </TD></TR>";
				}
			}
			Echo "</Table>";
		}
		else{
		echo "Please enter an issue number";
		}
	}
	
}

//not too sure yet.
if(array_key_exists('ChangeDeliveryMethod', $_POST)){
	$number = htmlspecialchars($_POST["issuenumber"]);
	$sql = "select Mailed.deliverystatus, 
				Mailed.receiverstatus, 
				from Mailed
				where Mailed.issuenumber = $number";
	$result = mysqli_query($conn, $sql);
}

mysqli_close($conn);


?>

