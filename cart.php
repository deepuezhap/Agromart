<?php
include "navbar.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>customerpage</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <br>
  <br>
  <br>



 <!--Actual cart that we see and how the data is fetched from db-->

<center><p style="color:red; font-size:30px;"><b>CART</b></p></center> <div class="container" style="min-height:400px;">
<table class="table table-responsive table-hover" style="border: 1px dashed #8c8b8b;
          border-top: 1px dashed #8c8b8b;">
<?php $con=mysqli_connect('localhost','root','','agromart');
$uname = $_SESSION['user'];
$count = 0;
$sql = "SELECT * FROM cart WHERE username = '$uname' order by cid asc" or die (mysqli_error($con));
$result=mysqli_query($con, $sql) or die (mysqli_error($con));
if(mysqli_num_rows($result)>=0){
 while($kk = mysqli_fetch_assoc($result)){
   $id = $kk['proid'];
   $count++;
   $sql = "SELECT * FROM product WHERE product_id = $id "  or die (mysqli_error($con));
   $r=mysqli_query($con, $sql) or die (mysqli_error($con));
   if(mysqli_num_rows($r)>0){
       $row = mysqli_fetch_assoc($r);
       $id = $row['product_id'];
?>                                                                
         <tr style="border: 1px dashed #8c8b8b;">
           <td  style="border: 1px dashed #8c8b8b;"><center><strong class="wow fadeInDown"><p style="margin-top:25px;">No.<?php echo $count;?></p></strong></center></td>
           <td style="border: 1px dashed #8c8b8b;"><center><img src="images/<?php echo $row['image']?>" width="120px;" class="img-responsive img-rounded wow fadeInDown"></center></td>
               <td style="border: 1px dashed #8c8b8b;">
               <dl  style="text-align:left">
               <dt>Name:</dt> <dd><?php echo $row['name'];?></dd>
               <?php 
               $stock=$row['stock'];
               if($stock<=0){ 
                ?>
               <dd><font color="red" size="6px">STOCK NOT AVAILABLE</font></dd>
             <?php }else{ ?>
               <dt>Quantity:</dt> <dd><form method="post">
                <input type="hidden" name="id" value="<?php echo $row['product_id']?>">
                 <input type="submit" name="minu" value="-">
                 <input type="button" name="stk" value="<?php echo $kk['qty'];?>">
                 <input type="submit" name="add" value="+"></form></dd>
               <dt>Prize:</dt> <dd><?php echo $row['price'];?></dd>
               <?php } ?>
               </dl></td>
               <td style="border: 1px dashed #8c8b8b;"><form action="" method="post"><button class="btn btn-primary  wow fadeInDown" name="cancel" type="submit" style="margin-top:25px;" value="<?php echo $id ?>">Cancel</button></form>
           </tr>

<?php }}
}
//icnrease quanty
if(isset($_POST["add"])){
  $pid=$_POST["id"];
  $uid = $_SESSION['user'];


  $sql = "SELECT * FROM cart where username='$uid' and proid=$pid";
  $result=mysqli_query($con, $sql);
  if(mysqli_num_rows($result)>0){
    $row = mysqli_fetch_assoc($result);
    $quan = $row['qty'];
    $sql = "SELECT * FROM product where product_id=$pid";                           
    $result=mysqli_query($con, $sql);
    $len = mysqli_fetch_assoc($result);
      $_SESSION['stock']=$len['stock'];               //storing stock in seesssion
      if($quan<$_SESSION['stock']){                //checking if quantity is less than stock
          $quan=$quan+1;
          $sql = ("UPDATE cart set qty='$quan' WHERE username='$uid' and proid='$pid'") ;
          $result=mysqli_query($con, $sql);
      }
    echo '<script>window.location.href="cart.php";</script>';
  }
}
//reduce quanty
if(isset($_POST["minu"])){
    $pid=$_POST["id"];
    $uid = $_SESSION['user'];
    $sql = "SELECT * FROM cart where username='$uid' and proid=$pid";
    $result=mysqli_query($con, $sql);
    if(mysqli_num_rows($result)>0){
      $row = mysqli_fetch_assoc($result);
      $quan = $row['qty'];
      $quan=$quan-1;
      if($quan<=0){
        $sql = "DELETE FROM cart WHERE proid = $pid AND username = '$uname'";
        mysqli_query($con, $sql);
        echo '<script>window.location.href="cart.php";</script>';
      }
      $sql = ("UPDATE cart set qty='$quan' WHERE username='$uid' and proid=$pid") ;
      $result=mysqli_query($con, $sql);
      echo '<script>window.location.href="cart.php";</script>';

    }


}
if(isset($_POST["cancel"])){
$pid=$_POST["cancel"];
$sql = "DELETE FROM cart WHERE proid = $pid AND username = '$uname'";
mysqli_query($con, $sql);
echo '<script>window.location.href="cart.php";</script>';
}
?>

</table>
</div></div>
   </div>
</section>
<?php $con=mysqli_connect('localhost','root','','agromart');
$uname = $_SESSION['user'];
$count = 0;
$id = 0;
$total=0;
$sql = "SELECT * FROM cart WHERE username = '$uname' order by cid desc" or die (mysqli_error($con));
$result=mysqli_query($con, $sql) or die (mysqli_error($con));
if(mysqli_num_rows($result)>=0){
while($row = mysqli_fetch_assoc($result)){
  $id = $row['proid'];
  $qty = $row['qty'];
  $count++;
  $sql = "SELECT * FROM product WHERE product_id = $id " or die (mysqli_error($con));
  $r=mysqli_query($con, $sql) or die (mysqli_error($con));
  if(mysqli_num_rows($result)>=0){
      $row = mysqli_fetch_assoc($r);
      $id = $row['product_id'];
      
        $total=$total+($qty*$row['price']);}}}?>
        <div class="container">
        <?php
        if($count>0)
        {
          ?>
        <p align="right">Total:<?php echo $total?></p>
        <?php 
      }
       ?>
        </div>
        <?php
        if($count==0)
        {
          echo'<script>alert("cart is empty");
          window.location.href="customer.php";
          </script>';
      }
       ?>

        <div class="container">
          
              
              <a class="btn btn-success  wow fadeInDown" name="order" type="button" style="margin-top:25px;" href="bill.php">Buy</a></td>
        </div>
</body>
</html>
