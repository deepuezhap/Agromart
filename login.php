<?php
session_start();

$con=mysqli_connect('localhost','root','','agromart');

if(isset($_POST['submit']))
{
$uname=$_POST['uname'];
$pswd=md5($_POST['pswd']);

$_SESSION['user']=$uname;


$sql="select * from `login` where username = '$uname' and password= '$pswd' and status = 1";
$result=mysqli_query($con,$sql);
$row2=mysqli_fetch_array($result);
$_SESSION['uid']=$row2['user_id'];                //login info stored in session variable uid
$num=mysqli_num_rows($result);
if($num > 0)
{
    $query="select * from login where username = '$uname' and password= '$pswd'";
    $result=mysqli_query($con,$query);
     $row=mysqli_fetch_array($result);
        $role=$row["role"];

    if($role == "customer")
    {
        header("location:customer.php");

    }
    else if($role == "seller"){


        header("location:sellernavbar.php");

    }
    else
    {
    header("location:adminnavbar.php");
    }
}
else{
    echo'<script>alert("wrong username or password!")</script>';

}

}
?>
<head>

    <title>Document</title>
    
    
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
  <br><br><br><br><br><br>
<div class="container mt-3">
<center>
		<form action="login.php" method="post">
    <h2>login</h2>
    <div class="mb-3 mt-3">
			   User name : <input type="text" name="uname"><br><br>
      </div>
      <div class="mb-3">     
         Password  : <input type="password" name="pswd"><br><br>
      </div>
      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            

			<a href="signup.php">Click to Signup</a><br><br>
		</form>
      </center>
	</div>




</body>
</html>
