<h1><center> CUSTOMER </center></h1>

<h2>Delivery Status</h2>
<form> 
	Issue Number: <input type="text" name="issuenumber">
	<input type="submit" name="GetInfo">
</form>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "select Mailed.issuenumber, 
		HasShipmentMethod.issuenumber,
		Mailed.deliverystatus, 
		Mailed.receiverstatus, 
		HasShipmentMethod.duration
		FROM Mailed
		INNER JOIN HasShipmentMethod
		ON Mailed.issuenumber = HasShipmentMethod.issuenumber";
$result = mysqli_query($conn, $sql);


Echo "<Table>";
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

mysqli_close($conn);

?>
<h2> Change Delivery Method </h2>