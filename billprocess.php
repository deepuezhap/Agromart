<?php
session_start();

if(isset($_GET["submit"])){
  $con=mysqli_connect('localhost','root','','agromart');
  $uname = $_SESSION['user'];
  $total=0;
  $sql = "SELECT * FROM cart WHERE username = '$uname' order by cid desc" or die (mysqli_error($con));
  $result=mysqli_query($con, $sql) or die (mysqli_error($con));
  while($row = mysqli_fetch_assoc($result)){
    $id = $row['proid'];
    $qty = $row['qty'];
    $sql = "SELECT * FROM product WHERE product_id = $id " or die (mysqli_error($con));
    $r=mysqli_query($con, $sql) or die (mysqli_error($con));
    if(mysqli_num_rows($r)>=0){
        $row = mysqli_fetch_assoc($r);
        $id = $row['product_id'];
        $total=$total+($qty*$row['price']);
      }
    }
    $sql = "INSERT INTO order_tbl VALUES ('','$uname','$total',now(),'1')";
    $result=mysqli_query($con, $sql);
    $sql = ("SELECT * FROM order_tbl");
    $re=mysqli_query($con, $sql);
    while($row = mysqli_fetch_array($re)){
      $order_id= $row['order_id'];
    }
    $sql = "SELECT * FROM cart WHERE username = '$uname'";
    $rt=mysqli_query($con, $sql);
    if(mysqli_num_rows($rt)>0){
     while($kk = mysqli_fetch_assoc($rt)){
       $id = $kk['proid'];
       $qty=$kk['qty'];
       $sql = "SELECT * FROM product WHERE product_id =$id";
       $results=mysqli_query($con, $sql);
       while($jk = mysqli_fetch_assoc($results)){
         $price = $jk['price'];
         $stock=$jk['stock'] - $kk['qty'];
         $sql=("UPDATE product SET stock='$stock' WHERE product_id='$id'");
         mysqli_query($con, $sql);
         $sql = "INSERT INTO order_detail VALUES ($order_id,$id,$price,$qty)";
         $result=mysqli_query($con, $sql);
       }
     }
   }
   $sql = ("DELETE FROM cart where username='$uname' " );
   mysqli_query($con, $sql);
   echo '<script>alert("Order Completed");
                                      window.location.href="customer.php"</script>';


 }


?>
