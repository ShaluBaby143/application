<html>

<body bgcolor="#17a2b8">
	<form action="" method="post">
	<label for="department">department</label>
	<input type="text" name="department"><br>
	<button type="submit" name="submit" value="submit">Submit</button>
</form>
</body>
</html>
<?php
$dbservername="localhost";
$dbusername="root";
$dbpassword="";
$dbname="application";
$conn=mysqli_connect($dbservername,$dbusername,$dbpassword,$dbname);
if(!$conn)
{
	die("connection failed:". mysqli_connect_error());
}
if(isset($_POST['department']) && isset($_POST['department']))
{
$department=$_POST['department'];
$sql="INSERT INTO department (courses)
VALUES('".$department."')";

$sim=mysqli_query($conn,$sql);
if($sim)
{
	echo"insert";
}
else{
	echo"not insert";
}
}
?>
