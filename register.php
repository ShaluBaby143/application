<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" type="text/css" href="css/register.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https::/maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xQ1aoWXA+05BRXPxPg6fy4IWv TNh0E263XmFcJISAwiGgFAW/dAi56JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!------ Include the above in your HEAD tag ---------->

<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="js/register.js"></script>
<!------ Include the above in your HEAD tag ---------->
<?php include_once('dbconfig.php');?>
<body style="background-color: #17a2b8;">
<div class="container">
            <form class="form-horizontal" role="form" method="post" action="?" enctype="multipart/form-data">
                <h2>Registration</h2>
                <div class="form-group" align="center">
                    <label for="firstimg">
                        <img src="../application/img/profile1.png" style="font-size:25px;border:1px solid black; padding:25px; cursor:pointer;" />
                    </label>
                    <input type="file" name="file" id="firstimg" style="display:none; visibility: none;" onchange="getIamge(this.value);">
                     <div id="display-image"></div>
                </div>
                <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">First Name</label>
                    <div class="col-sm-9">
                        <input type="text" name ="firstName" placeholder="First Name" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="lastName" class="col-sm-3 control-label">Last Name</label>
                    <div class="col-sm-9">
                        <input type="text" name="lastName" placeholder="Last Name" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="dateofbirth" class="col-sm-3 control-label">Date Of Birth </label>
                    <div class="col-sm-9">
                        <input type="date" name="dateofbirth" placeholder="DateOfBirth" class="form-control" name= "date" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="bloodgroup" class="col-sm-3 control-label">Blood Group</label>
                    <div class="col-sm-9">
                        <input type="bloodgroup" name="bloodgroup" placeholder="Blood Group" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="qualification" class="col-sm-3 control-label">Qualification</label>
                    <div class="col-sm-9">
                        <input type="qualification" name="qualification" placeholder="Qualification" class="form-control" required>
                    </div>
                </div>
               <?php
$sql = "SELECT courses FROM department";
$result = mysqli_query($conn,$sql);  
?>
                <div class="form-group">
                    <label for="department" class="col-sm-3 control-label">Department</label>
                    <div class="col-sm-9">
                        <select name="department">
                            <option value="">--- Select ---</option> 
                        <?php while($res=mysqli_fetch_assoc($result)){ ?>
                            <option value="<?php echo $res['courses'];?>"><?php echo $res['courses'];?></option>
                        <?php }?>
                        </select>
                        </div>
                </div>
                <div class="form-group">
                    <label for="phoneNumber" class="col-sm-3 control-label">Phone number</label>
                    <div class="col-sm-9">
                        <input type="phoneNumber" name="phoneNumber" placeholder="Phone number" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                        <label for="email" class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-9">
                        <input type="email" name="email" placeholder="email" class="form-control" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block" name="submit">Register</button>
            </form>
        </div>
    </body>
 <?php
 if(isset($_POST['submit']))
 {
   if(($_POST['firstName'])&&($_POST['lastName'])&&($_POST['dateofbirth'])&&($_POST['bloodgroup'])&&($_POST['qualification'])&&($_POST['department'])&&($_POST['phoneNumber'])&&($_POST['email']))
    {
$targetDir = "upload/";
$fileName = $_FILES["file"]["name"];
$file_temp_loc = $_FILES["file"]["tmp_name"];
$targetFilePath = "upload/$fileName";
$upload  = move_uploaded_file($file_temp_loc,$targetFilePath);
 $firstName=$_POST['firstName'];
 $lastName=$_POST['lastName'];
 $dateofbirth=$_POST['dateofbirth'];
 $bloodgroup=$_POST['bloodgroup'];
 $qualification=$_POST['qualification'];
 $department=$_POST['department'];
 $phoneNumber=$_POST['phoneNumber'];
 $email=$_POST['email'];
 $sql1="INSERT INTO applicationsheet (fileName,firstName,lastName,dateofbirth,bloodgroup,qualification,department,phoneNumber,email)
VALUES('".$targetFilePath."','".$firstName."','".$lastName."','".$dateofbirth."','".$bloodgroup."','".$qualification."','".$department."','".$phoneNumber."','".$email."')";

$sim=mysqli_query($conn,$sql1);
if($sim)
{
    echo"insert";
}
else{
    echo"not insert";
}
}
}
?>



        
