<?php 
$con=mysqli_connect('localhost','root','','agromart');
if(isset($_POST['submit']))
{
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$adrs=$_POST['adrs'];
$phno=$_POST['phno'];
$email=$_POST['email'];
$uname=$_POST['uname'];
$pswd=md5($_POST['pswd']);
$role=$_POST['role'];
$status = 1;
if($role == "seller")
{
    $status = 0;
}



$sql1="insert into `user`(`fname`,`lname`,`address`,`ph_no`,`email`) values('$fname','$lname','$adrs','$phno','$email')";
$sql2="insert into `login`(`username`,`password`,`role`,`status`) values('$uname','$pswd','$role','$status')";

$sql3="select * from `login` where username = '$uname'";
$result=mysqli_query($con,$sql3);
$num=mysqli_num_rows($result);
if($num > 0)
{
    echo'<script>alert("username already taken!")</script>';
}
else{

    mysqli_query($con,$sql1);
    mysqli_query($con,$sql2);
    header("location:login.php");
}

}
?>        

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="signupstyle.css">
  <title>Document</title>
</head>
<body>
<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-12 col-lg-9 col-xl-7">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration Form</h3>
            <form action="signup.php" method="POST">

              <div class="row">
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <input type="text" name="fname" required class="form-control form-control-lg" />
                    <label class="form-label" for="fname">First Name</label>
                  </div>

                </div>
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <input type="text" name="lname" required class="form-control form-control-lg" />
                    <label class="form-label" for="lname">Last Name</label>
                  </div>

                </div>
                <div class="col-md-6 mb-4">

                    <div class="form-outline">
                      <input type="text" name="adrs" required class="form-control form-control-lg" />
                      <label class="form-label" for="adrs">Address</label>
             </div>

             </div>
             <div class="col-md-6 mb-4">

                     <div class="form-outline">
                     <input type="text" name="phno" pattern="[0-9]{10}" required class="form-control form-control-lg" />
                     <label class="form-label" for="phno">Phone No</label>
             </div>

             </div>

              </div>

              <div class="row">
              <div class="col-md-6 mb-4">

             <div class="form-outline">
                      <input type="email" name="email" class="form-control form-control-lg" />
                      <label class="form-label" for="email">Email</label>
                 </div>

                </div>
          
                <div class="col-md-6 mb-4">

                  <h6 class="mb-2 pb-1">Role: </h6>

                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="role" value="customer" required
                      value="option1" checked />
                    <label class="form-check-label" >Customer</label>
                  </div>

                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="role" value="seller" required
                      value="option2" />
                    <label class="form-check-label" >Seller</label>
                  </div>

        
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-4 pb-2">

                  <div class="form-outline">
                    <input type="text" name="uname" required class="form-control form-control-lg" />
                    <label class="form-label" for="uname">Username</label>
                  </div>

                </div>
                <div class="col-md-6 mb-4 pb-2">

                  <div class="form-outline">
                    <input type="password" name="pswd" required class="form-control form-control-lg" />
                    <label class="form-label" for="pswd">Password</label>
                  </div>

                </div>
              </div>



              <div class="mt-4 pt-2">
                <input class="btn btn-primary btn-lg" type="submit" name="submit" value="signup" /><br><br>
              </div>
              <div class="col-lg-6 login-btm login-button">
              <a href="login.php"> <button type="button" name="login" class="btn btn-outline-primary">Login</button></a>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>