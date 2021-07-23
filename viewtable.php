	<?php 
	session_start();
	include('dbconfig.php');
	$phoneNumber=$_SESSION['phoneNumber'];
	$sql="SELECT department FROM applicationsheet WHERE phoneNumber='$phoneNumber'";
	$result=$conn->query($sql);
	?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/viewfulltabledetails.css">
	<link rel="stylesheet" type="text/css" href="css/viewtable.css"></head>
<form action="register.php" method="post">
	<p align="center">
		<button type="submit" name="submit" value="New Application">New Application</button>
	</p>
</form>
<body>
<center><table border="2">
	<tr>
		<th>Department</th>
	</tr>
	<tr>
	<?php
	while($row=$result->fetch_assoc())
	{?>
		<td><?php echo $row['department'];?></td>
		<td><a href="viewfulltabledetails.php">View</a></td>
	</tr>
	<?php
}?>
</table>
</center>
<div id="mybutton">
	<label for="payment">Application Payment Details</label>
<button class="payment">Payment</button>

</div>
</body>
</html>