<?php
include "navbar.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>details</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
  <style>

.info {
  background-color: #e7f3fe;
  border-left: 6px solid #2196F3;
}
</style>
</head>
<body>
  

<?php
    $id=$_GET['pro'];
    $con=mysqli_connect('localhost','root','','agromart');

    $sql="select * from product where product_id=$id";
    $result=mysqli_query($con,$sql);
    
    ?>
    <div class="container-fluid mt-3">
    <?php
    while($row=mysqli_fetch_assoc($result)){
      $seller_id=$row['seller_id'];
      $stock=$row['stock'];
?>
<div class="card">
  <div class="card-header"><img src="images/<?php echo $row['image']?>" min-width="200" height="200"></div>
  <div class="card-body"><?php echo $row['name'];?></div>
  <div class="card-footer"><p style="color:red">SELLING RATE:<?php echo $row['price'];?></p></div>
</div>
<?php
if($stock>0)
{
?>
<form action="cartaction.php"method="get">
    <button type="submit" value="<?php echo $row['product_id'];?>" name="cart">ADD TO CART</button>
</form>
<?php
}
?>
<?php

}
?>
</div>

<?php
$sql1="select * from user where user_id='$seller_id'";
$result2=mysqli_query($con,$sql1);
while($row2=mysqli_fetch_assoc($result2))
{


?>
<div class="info">
  <p><strong>Seller details</strong></p><p><?php echo $row2['fname']." ".$row2['lname'];?></p>
  <p><?php echo $row2['address'] ;?></p>
  <p><?php echo $row2['ph_no'] ;?></p>
  <p><?php echo $row2['email'] ;?></p>
</div>

<?php
}
?>
</body>
</html>
