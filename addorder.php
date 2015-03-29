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
?>

<h2>Add a new order</h2>

<form method="POST" action="addorder.php">
	<h4><b>Item Information</b></h4>
	<table>
	<tr>
		<td>Item Number</td>
		<td>Size</td>
		<td>Types of item being send</td>
	</tr>
	<TR>
		<TD><Input type ="text" name = "itemnumber"></TD>
		<TD><select name="size" id="size">
            	<option value="">Select One</option>
            	<option value = "S">S</option>
            	<option value = "M">M</option>
            	<option value = "L">L</option>
    		</select>
    	</TD>
		<TD><select name="type" id="type">
            	<option value="">Select One</option>
            	<option value = "Letter">Letter</option>
            	<option value = "Package">Package</option>
    		</select>
		</TD>
		<td><input type="submit" name="insertItem"></td>
	</TR>
	</Table>
</form>

<?php
	if(array_key_exists('insertItem', $_POST)) {
		$itemnumber = htmlspecialchars($_POST["itemnumber"]);
		$size = htmlspecialchars($_POST["size"]);
		$type = htmlspecialchars($_POST["type"]);
		$itemSql = "insert into Item (itemnumber, size, type) values ('$itemnumber', '$size', '$type')";
		if (mysqli_multi_query($conn, $itemSql)) {
    		echo "New records created successfully";
		} else {
    		echo "Error: " . $itemSql . "<br>" . mysqli_error($conn);
		}
		$itemTableSql = "select * from Item where Item.itemnumber = $itemnumber";
		$resultItemTable = mysqli_query($conn, $itemTableSql);
		if(is_object($resultItemTable)) {
			Echo "<Table  class=table>";
			Echo "<TR><TD>Item Number</TD>
				<TD>Size</TD>
				<TD>Type</TD></TR>";
			if (mysqli_num_rows($resultItemTable) > 0) {
				while($array = mysqli_fetch_array($resultItemTable)) {
					echo "<TR><TD> $array[0] </TD>";
					echo 	 "<TD> $array[1] </TD>";
					echo 	 "<TD> $array[2] </TD></TR>";
				}
			}
				Echo "</Table>";
			}
	}
?>

<form method="POST" action="addorder.php">
	<h4><b>Office received information</b></h4>
	<table>
	<tr>
		<td>Issue Number</td>
		<td>Tracking Number</td>
		<td>Destination</td>
		<td>Branch ID</td>
		<td>Item Number</td>
	</tr>
	<TR>
		  <TD><Input type = "text" name = "issuenumber2"></TD>
		  <TD><Input type = "text" name = "trackingnumber"></TD>
		  <TD><Input type = "text" name = "destination"></TD>
		  <TD><Input type = "text" name = "branchid"></TD>
		  <TD><Input type = "text" name = "itemnumber2"></TD>
		  <td><input type="submit" name="insertOfficeInfo"></td>
	</TR>
	</Table>
</form>

<?php
	if(array_key_exists('insertOfficeInfo', $_POST)){
		$issuenumber = htmlspecialchars($_POST["issuenumber2"]);
		$trackingnumber = htmlspecialchars($_POST["trackingnumber"]);
		$destination = htmlspecialchars($_POST["destination"]);
		$branchid = htmlspecialchars($_POST["branchid"]);
		$itemnumber2 = htmlspecialchars($_POST["itemnumber2"]);
		if(is_numeric($issuenumber) && is_numeric($trackingnumber) && is_numeric($branchid) && is_numeric($itemnumber2)){
			$checkForBranchIDSql = "select Branch.branchid 
								from Branch 
								where Branch.branchid = $branchid"; 
			$resultBranchID = mysqli_query($conn,$checkForBranchIDSql);
			$checkForItemnumberSql = "select Item.itemnumber 
								from Item 
								where Item.itemnumber = $itemnumber2"; 
			$resultItemnumber = mysqli_query($conn,$checkForItemnumberSql);
			$checkForTrackingnumberSql = "select OfficeReceived.trackingnumber 
								from OfficeReceived
								where OfficeReceived.trackingnumber = $trackingnumber"; 
			$resultTrackingnumber = mysqli_query($conn,$checkForTrackingnumberSql);
			if((mysqli_num_rows($resultBranchID) > 0) && (mysqli_num_rows($resultItemnumber) > 0) && !(mysqli_num_rows($resultTrackingnumber) > 0)){
			
				$OfficeSql = "insert into OfficeReceived (issuenumber, trackingnumber, destination,branchid,itemnumber)
					values ('$issuenumber', '$trackingnumber', '$destination','$branchid','$itemnumber2')";
				if (mysqli_multi_query($conn, $OfficeSql)) {
    				echo "New records created successfully";
				} else {
    				echo "Error: " . $OfficeSql . "<br>" . mysqli_error($conn);
				}
				$OfficeTableSql = "select * 
					from OfficeReceived
					where OfficeReceived.itemnumber = $itemnumber2";
				$resultOfficeTable = mysqli_query($conn, $OfficeTableSql);
				if(is_object($resultOfficeTable)){
					Echo "<Table  class=table>";
					Echo "<TR><TD>Issue Number</TD>
						<TD>Tracking Number</TD>
						<TD>Destination</TD>
						<TD>Branch Id </TD>
						<TD>Item Number</TD></TR>";
					if (mysqli_num_rows($resultOfficeTable) > 0) {
						while($array = mysqli_fetch_array($resultOfficeTable)) {
							echo "<TR><TD> $array[0] </TD>";
							echo 	 "<TD> $array[1] </TD>";
							echo 	 "<TD> $array[2] </TD>";
							echo 	 "<TD> $array[3] </TD>";
							echo 	 "<TD> $array[4] </TD></TR>";
						}
					}
					Echo "</Table>";
				}
			}else{
				echo "Branch Number or Item Number doesn't exist. OR Tracking Number already exist.";
			}
		}else{
			echo "All numbers and id has to be an integer.";
		}
	}
?>

<form method="POST" action="addorder.php">
	<h4><b>Shipment Method</b></h4>
	<table>
	<tr>
		<td>Issue Number</td>
		<td>Days</td>
		<td>Method</td>
	</tr>
	<TR>
		<TD><Input type = "text" name = "issuenumber3"></TD>
		<TD><Input type = "text" name = "days"></TD>
		<TD><select name="method" id="method">
            	<option value = "">Select One</option>
            	<option value = "regular">Regular</option>
            	<option value = "express">Express</option>
    		</select>
    	</TD>
		<td><input type="submit" name="insertShipmentInfo"></td>
	</TR>
	</Table>
</form>

<?php
	if (array_key_exists('insertShipmentInfo', $_POST)) {
		$issuenumber3 = htmlspecialchars($_POST["issuenumber3"]);
		$days = htmlspecialchars($_POST["days"]);
		$method = htmlspecialchars($_POST["method"]);
		if(is_numeric($issuenumber3) && is_numeric($days)){
			$checkForIssuenumberSql = "select HasShipmentMethod.issuenumber 
								from HasShipmentMethod 
								where HasShipmentMethod.issuenumber = $issuenumber3"; 
			$resultIssuenumber = mysqli_query($conn,$checkForIssuenumberSql);
			if(!(mysqli_num_rows($resultIssuenumber) > 0)){
				$ShipmentSql = "insert into HasShipmentMethod (issuenumber, days, method)
					values ('$issuenumber3', '$days', '$method')";
				if (mysqli_multi_query($conn, $ShipmentSql)) {
    				echo "New records created successfully";
				} else {
    				echo "Error: " . $ShipmentSql . "<br>" . mysqli_error($conn);
				}
			}else{
				echo "Issue Number already exist.";
			}
			$ShipmentTableSql = "select * 
					from HasShipmentMethod
					where HasShipmentMethod.issuenumber = $issuenumber3";
			$resultShipmentTable = mysqli_query($conn, $ShipmentTableSql);
				if(is_object($resultShipmentTable)){
					Echo "<Table  class=table>";
					Echo "<TR><TD>Issue Number</TD>
						<TD>Days</TD>
						<TD>Method</TD></TR>";
					if (mysqli_num_rows($resultShipmentTable) > 0) {
						while($array = mysqli_fetch_array($resultShipmentTable)) {
							echo "<TR><TD> $array[0] </TD>";
							echo 	 "<TD> $array[1] </TD>";
							echo 	 "<TD> $array[2] </TD></TR>";
						}
					}
					Echo "</Table>";
				}
		}else{
			echo "Issuenumber must be an integer.";
		}
	}
?>

<form method="POST" action="addorder.php">
	<h4><b>Payment</b></h4>
	<table>
	<tr>
		<td>Receipt Number</td>
		<td>Issue Number</td>		
		<td>Amount</td>
		<td>Payment Type</td>
		<td>Holder Name</td>
		<td>Card Number</td>
		<td>Service Type</td>
	</tr>
	<TR>
		  <TD><Input type = "text" name = "receiptnumber"></TD>
		  <TD><Input type = "text" name = "issuenumber4"></TD>
		  <TD><Input type = "text" name = "amount"></TD>
		  <TD><select name="ptype" id="ptype">
            	<option value = "">Select One</option>
            	<option value = "Cash">Cash</option>
            	<option value = "Credit Card">Credit Card</option>
            	<option value = "Stamp">Stamp</option>
    		  </select>
    	  </TD>
		  <TD><Input type = "text" name = "holdername2"></TD>
		  <TD><Input type = "text" name = "cardnumber2"></TD>
		  <TD><select name="stype" id="stype">
            	<option value = "">Select One</option>
            	<option value = "Local">Local</option>
            	<option value = "International">International</option>
    		</select></TD>
		  <td><input type="submit" name="insertPaid"></td>
	</TR>
	</Table>
</form>

<?php
	if (array_key_exists('insertPaid', $_POST)) {
		$receiptnumber = htmlspecialchars($_POST["receiptnumber"]);
		$issuenumber4 = htmlspecialchars($_POST["issuenumber4"]);
		$amount = htmlspecialchars($_POST["amount"]);
		$ptype = htmlspecialchars($_POST["ptype"]);
		$holdername2 = htmlspecialchars($_POST["holdername2"]);
		$cardnumber2 = htmlspecialchars($_POST["cardnumber2"]);
		$stype = htmlspecialchars($_POST["stype"]);
		if(is_numeric($receiptnumber) && is_numeric($issuenumber4) && is_numeric($amount) && is_numeric($cardnumber2)){
			$checkForIssuenumberSql = "select Paid.issuenumber 
								from Paid
								where Paid.issuenumber = $issuenumber4"; 
			$resultIssuenumber = mysqli_query($conn,$checkForIssuenumberSql);
			if(!(mysqli_num_rows($resultIssuenumber) > 0)){
				$PaidSql = "insert into Paid (receiptnumber, issuenumber, amount,ptype,holdername,cardnumber,stype)
					values ('$receiptnumber', '$issuenumber4', '$amount','$ptype','$holdername2','$cardnumber2','$stype')";
				if (mysqli_multi_query($conn, $PaidSql)) {
    				echo "New records created successfully";
				} else {
    				echo "Error: " . $PaidSql . "<br>" . mysqli_error($conn);
				}
			}else{
				echo "Issue Number already exist.";
			}
			$PaidTableSql = "select * 
					from Paid
					where Paid.issuenumber = $issuenumber4";
			$resultPaidTable = mysqli_query($conn, $PaidTableSql);
				if(is_object($resultPaidTable)){
					Echo "<Table  class=table>";
					Echo "<TR><TD>Receipt Number</TD>
						<TD>Issue Number</TD>
						<TD>Amount (CAD)</TD>
						<TD>Payment Type </TD>
						<TD>Holder Name </TD>
						<TD>Card Number </TD>
						<TD>Stamp Type</TD></TR>";
					if (mysqli_num_rows($resultPaidTable) > 0) {
						while($array = mysqli_fetch_array($resultPaidTable)) {
							echo "<TR><TD> $array[0] </TD>";
							echo 	 "<TD> $array[1] </TD>";
							echo 	 "<TD> $array[2] </TD>";
							echo 	 "<TD> $array[3] </TD>";
							echo 	 "<TD> $array[4] </TD>";
							echo 	 "<TD> $array[5] </TD>";
							echo 	 "<TD> $array[6] </TD>";
							echo 	 "<TD> $array[7] </TD></TR>";
						}
					}
					Echo "</Table>";
				}
		}else{
			echo "Receipt, Issue, Card and amount must be an integer.";
		}
	}
?>

<form method="POST" action="addorder.php">
	<h4><b>Mailing information</b></h4>
	<table>
	<tr>
		<td>Branch ID</td>
		<td>Issue Number</td>
		<td>Delivery Status</td>
		<td>Receiver Status</td>
	</tr>
	<TR>
		  <TD><Input type = "text" name = "branchid2"></TD>
		  <TD><Input type = "text" name = "issuenumber5"></TD>
		  <TD><select name="deliverystatus" id="deliverystatus">
            	<option value = "">Select One</option>
            	<option value = "Waiting">Waiting</option>
            	<option value = "Sent">Sent</option>
    		</select></TD>
		  <TD> <select name="receiverstatus" id="receiverstatus">
            	<option value = "">Select One</option>
            	<option value = "Delievered">Delievered</option>
            	<option value = "Not Delievered">Not Delievered</option>
    		</select></TD>
		  <td><input type="submit" name="insertMailed"></td>
	</TR>
	</Table>
</form>

<?php
	if (array_key_exists('insertMailed', $_POST)) {
		$branchid2 = htmlspecialchars($_POST["branchid2"]);
		$issuenumber5 = htmlspecialchars($_POST["issuenumber5"]);
		$deliverystatus = htmlspecialchars($_POST["deliverystatus"]);
		$receiverstatus = htmlspecialchars($_POST["receiverstatus"]);
		if(is_numeric($branchid2) && is_numeric($issuenumber5)){
			$checkForIssuenumberSql = "select Mailed.issuenumber 
								from Mailed 
								where Mailed.issuenumber = $issuenumber5"; 
			$resultIssuenumber = mysqli_query($conn,$checkForIssuenumberSql);
			if(!(mysqli_num_rows($resultIssuenumber) > 0)){
				$PaidSql = "insert into Mailed (branchid, issuenumber,deliverystatus,receiverstatus)
					values ('$branchid2', '$issuenumber5', '$deliverystatus','$receiverstatus')";
				if (mysqli_multi_query($conn, $PaidSql)) {
    				echo "New records created successfully";
				} else {
    				echo "Error: " . $PaidSql . "<br>" . mysqli_error($conn);
				}
				$MailedTableSql = "select * 
					from Mailed
					where Mailed.issuenumber = $issuenumber5";
				$resultMailedTable = mysqli_query($conn, $MailedTableSql);
				if(is_object($resultMailedTable)){
					Echo "<Table  class=table>";
					Echo "<TR><TD>Branch ID</TD>
						<TD>Issue Number</TD>
						<TD>Delivery Status</TD>
						<TD>Receiver Status</TD></TR>";
					if (mysqli_num_rows($resultMailedTable) > 0) {
						while($array = mysqli_fetch_array($resultMailedTable)) {
							echo "<TR><TD> $array[0] </TD>";
							echo 	 "<TD> $array[1] </TD>";
							echo 	 "<TD> $array[2] </TD>";
							echo 	 "<TD> $array[3] </TD></TR>";
						}
					}
					Echo "</Table>";
				}
			}else{
				echo "Issue Number already exist.";
			}
		}else{
			echo "Receipt, Issue, Card and amount must be an integer.";
		}
			
			
	}
	mysqli_close($conn);
?>
