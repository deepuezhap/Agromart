<?php
include "navbar.php";
$con=mysqli_connect('localhost','root','','agromart');
$id=$_REQUEST['id'];
$sql1="select * from user where user_id='$id'";


$results=mysqli_query($con,$sql1);
$row=mysqli_fetch_assoc($results);


if(isset($_POST['submit']))
{   
    $uid=$_POST['uid'];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $address=$_POST['address'];
    $phno=$_POST['ph_no'];
    $email=$_POST['email'];
   

    $sql2="update user set fname='$fname',lname='$lname',address='$address',ph_no='$phno',email='$email'
     where user_id='$uid'";
    mysqli_query($con,$sql2);
    header("location:customer.php");

    
}
?>
<html>
<head><title>Document</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body><br><br>
<div class="container mt-3">   
   <form action="updatecustomer.php" method="POST">
    <input type="hidden" name="uid" value="<?php echo $id ?>"><br><br>
    First Name:<input type="text" class="form-control mt-3" name="fname" value="<?php echo $row['fname'] ?>"> <br><br>
    Last Name:<input type="text" class="form-control mt-3" name="lname" value="<?php echo $row['lname'] ?>"><br><br>
    Address:<input type="text" class="form-control mt-3" name="address" value="<?php echo $row['address'] ?>"><br><br>
    Phone Number:<input type="text" class="form-control mt-3" name="ph_no" value="<?php echo $row['ph_no'] ?>"> <br><br>
    Email:<input type="text" name="email" class="form-control mt-3" value="<?php echo $row['email'] ?>"><br><br>
    <input type="submit" class="btn btn-primary" name="submit" value="update">

</form>

</div>
</body>
</html>