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

$sql="select * from product where stock>0";
$result=mysqli_query($con,$sql);
?>
<div class="container-fluid mt-3">
<?php
while($row=mysqli_fetch_assoc($result)){

?>
<div class="card">
<form action="details.php" method="get">
    <button type="submit" name="pro" value="<?php echo $row['product_id'];?>">
  <div class="card-header"><img src="images/<?php echo $row['image']?>" width="200" height="200"></div>
  <div class="card-body"><?php echo $row['name'];?></div>
  <div class="card-footer"><p style="color:red">SELLING RATE:<?php echo $row['price'];?></p></div>
</button></form>
</div>

<?php
}
?>
</div>
</body>
</html>
