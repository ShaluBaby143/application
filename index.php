<?php
session_start();
 include_once('dbconfig.php');
 ?>
<html>
<head>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/index.css">
<!------ Include the above in your HEAD tag ---------->
</head>
<body>
    <div id="login">
        <h3 class="text-center text-white pt-3">Login form</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
                                <label for="phoneNumber" class="text-info">PhoneNumber:</label><br>
                                <input type="text" name="phoneNumber" id="phoneNumber" class="form-control" placeholder="Enter your PhoneNumber">
                            </div>
                            <div class="form-group">
                                <label for="dateofbirth" class="text-info">Date Of Birth:</label><br>
                                <input type="date" name="dateofbirth" id="dateofbirth" class="form-control" placeholder="Enter your DateOfBirth">
                            </div>
                            <div class="form-group">
                                
                                <button type="submit" name="submit" class="btn btn-info btn-md" value="submit" name="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php
if(isset($_POST['submit']))
{
  $phoneNumber=$_POST['phoneNumber'];
  $dateofbirth=$_POST['dateofbirth'];
  $sql="SELECT phoneNumber,dateofbirth FROM applicationsheet WHERE phoneNumber='$phoneNumber' AND dateofbirth='$dateofbirth'";
  $result=mysqli_query($conn,$sql);
  
  if($result->num_rows > 0)
  {
    $_SESSION['phoneNumber']=$phoneNumber;
    header("Location:viewtable.php");
  }
  else
  {
    header("Location:register.php");
  }
}

$conn->close();
?>