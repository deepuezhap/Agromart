<?php
include "navbar.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>customerpage</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
</head>
<body>


<?php
$con=mysqli_connect('localhost','root','','agromart');

$sql="select * from product";
$result=mysqli_query($con,$sql);
?>
<br><br><br>
<div class="container-fluid mt-3">
  <CENTER>
<?php include('search.php');?>

</CENTER>

</div>
</body>
</html>
