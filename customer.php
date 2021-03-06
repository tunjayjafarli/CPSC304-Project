<?php
include ("header.php");
?>

<h2><p style=color:darkblue> Delivery Status</h2>
<form method="POST" action="customer.php"> 
	Issue Number: <input type="text" name="issuenumber">
	<input type="submit" name="GetInfo" class="btn btn-default">
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
	$number = htmlspecialchars($_POST["issuenumber"]);
	if(is_numeric($number)){
		$sql = "select Mailed.issuenumber, 
		Mailed.deliverystatus, 
		Mailed.receiverstatus, 
		HasShipmentMethod.days
		from Mailed
		inner join HasShipmentMethod
		on Mailed.issuenumber = HasShipmentMethod.issuenumber
		where Mailed.issuenumber = $number";
		$result = mysqli_query($conn, $sql);
		if(is_object($result)){
			if (mysqli_num_rows($result) > 0) {
				while($array = mysqli_fetch_array($result)) {
					Echo "<Table class=table>";
					Echo "<TR><TD>Issue Number</TD>
					<TD>Delivery Status</TD>
					<TD>Reciever Status</TD>
					<TD>Days</TD> </TR>";
					echo "<TR><TD> $array[0] </TD>";
					echo 	 "<TD> $array[1] </TD>";
					echo 	 "<TD> $array[2] </TD>";
					echo 	 "<TD> $array[3] </TD></TR>";
				}
			}
			Echo "</Table>";
		}
		else{
			echo "<p style=color:red>Please enter a valid issue number";
		}
	}
	
}
?>

<h2><p style=color:darkblue> Change Delivery Method </h2>
<form method="POST" action="customer.php"> 
	Issue Number: <input type="text" name="issuenumber"><br>
	Card Number: <input type="text" name="cardnumber"><br>
	Holder Name: <input type="text" name="holdername"><br>
	<input type="radio" name="method" value="regular" checked>Regular
	<input type="radio" name="method" value="express">Express
	<input type="submit" name="ChangeDeliveryMethod" class='btn btn-default'>
</form>

<?php
if(array_key_exists('ChangeDeliveryMethod', $_POST)){
	$issuenumber = htmlspecialchars($_POST["issuenumber"]);
	$cardnumber = htmlspecialchars($_POST["cardnumber"]);
	$holdername = htmlspecialchars($_POST["holdername"]);
	$method = htmlspecialchars($_POST["method"]);
	$amount = 0;
	$days = 0;
	if(strcmp ($method, 'express') == 0){
		$amount = 30;
		$days = 5;
	}
	else{
		$amount = -30;
		$days = -5;
	}
	
	if(is_numeric($issuenumber) && is_numeric($cardnumber)){
		
		$checkmethod = "select HasShipmentMethod.method
		from HasShipmentMethod
		where HasShipmentMethod.issuenumber = $issuenumber";
		$resultmethod = mysqli_query($conn, $checkmethod);
		$array = mysqli_fetch_array($resultmethod);
		if(strcmp($method, $array[0]) == 0){
			echo "Method is already $array[0] ";
		}else{
			$updateShipmentSql = "update HasShipmentMethod
			inner join Mailed
			on HasShipmentMethod.issuenumber = Mailed.issuenumber
			set HasShipmentMethod.method = '$method',
			HasShipmentMethod.days = HasShipmentMethod.days + $days
			where HasShipmentMethod.issuenumber = $issuenumber 
			and Mailed.deliverystatus = 'Waiting'";
			$updatePaidSql = "update Paid
			inner join HasShipmentMethod
			on Paid.issuenumber = HasShipmentMethod.issuenumber
			set Paid.amount = Paid.amount + $amount,
			Paid.ptype = 'Credit Card',
			Paid.holdername = '$holdername',
			Paid.cardnumber = $cardnumber
			where Paid.issuenumber = $issuenumber
			and not (HasShipmentMethod.method = '%$method%')";
			$resultShipment = mysqli_query($conn, $updateShipmentSql);
			$resultPaid = mysqli_query($conn, $updatePaidSql);
			echo "Shipment was changed successfully.";
			$tablesql = "select HasShipmentMethod.issuenumber,
			HasShipmentMethod.days, 
			HasShipmentMethod.method, 
			Paid.amount
			from HasShipmentMethod
			inner join Paid
			on HasShipmentMethod.issuenumber = Paid.issuenumber 
			where HasShipmentMethod.issuenumber = $issuenumber";
			$resulttable = mysqli_query($conn, $tablesql);
			if(is_object($resulttable)){
				Echo "<Table  class=table>";
				Echo "<TR><TD>Issue Number</TD>
				<TD>Days</TD>
				<TD>Method</TD>
				<TD>Amount</TD></TR>";
				if (mysqli_num_rows($resulttable) > 0) {
					while($array = mysqli_fetch_array($resulttable)) {
						echo "<TR><TD> $array[0] </TD>";
						echo 	 "<TD> $array[1] </TD>";
						echo 	 "<TD> $array[2] </TD>";
						echo 	 "<TD> $array[3] </TD></TR>";
					}
				}
				Echo "</Table>";
			}
		}
	}
	else{
		echo "<p style=color:red> Please enter valid Issue Number and Card Number."; 
	}
}
mysqli_close($conn);
?>