<?php 
session_start();
include_once('dbconfig.php');
$phoneNumber=$_SESSION['phoneNumber'];
$sql="SELECT * FROM applicationsheet WHERE phoneNumber='$phoneNumber'";
$result=$conn->query($sql);
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/viewfulltabledetails.css"></head>
<body>
	<center>
		<p>View The Full Detials Of User</p>
		<table border="1" >
		<tr>
			<th>ID</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Date Of Birth</th>
			<th>Blood Group</th>
			<th>Qualification</th>
			<th>Department</th>
			<th>Phone Number</th>
			<th>Email</th>
		</tr>
		<tr>
			<?php
			while($row=$result->fetch_assoc())
				{?>
					<td><?php echo $row['id'];?></td>
					<td><?php echo $row['firstName'];?></td>
					<td><?php echo $row['lastName'];?></td>
					<td><?php echo $row['dateofbirth'];?></td>
					<td><?php echo $row['bloodgroup'];?></td>
					<td><?php echo $row['qualification'];?></td>
					<td><?php echo $row['department'];?></td>
					<td><?php echo $row['phoneNumber'];?></td>
					<td><?php echo $row['email'];?></td>
				</tr>
				<?php
			}?>
		</table></center>
	</body>
	</html>

