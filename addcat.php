
<?php
include "adminnavbar.php";
$con=mysqli_connect('localhost','root','','Agromart');
if(isset($_POST['submit']))
{

    $name=$_POST['name'];
    $sql1="insert into `category`(`name`) values('$name')";
    mysqli_query($con,$sql1);
    header("location:adminnavbar.php");
    
}
?>

<html>
<head><title>Document</title></head>
<body>
<br><br><br><br>
<center><br> <br>
<h2>Add Category</h2>
<form action="addcat.php" method="POST">
Category Name:<input type="text" name="name" ><br><br>
<input type="submit" name="submit" value="submit">
</form>
</center>
</body>
</html>