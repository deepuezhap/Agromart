<?php
  session_start();
if(isset($_SESSION['user'])){

  $con=mysqli_connect('localhost','root','','agromart');

    if(isset($_GET['cart'])){
      $uid=$_SESSION['user'];
      $pid=$_GET['cart'];
      $sql = "SELECT * FROM cart where username='$uid' and proid=$pid";
      $result=mysqli_query($con, $sql);
      if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_assoc($result);
        $quan = $row['qty'];
        $quan=$quan+1;
        $sql = ("UPDATE cart set qty='$quan' WHERE username='$uid' and proid=$pid") ;
        $result=mysqli_query($con, $sql);
      }
      else{
      $sql = "INSERT INTO cart(username,proid,qty) VALUES ('$uid',$pid,1)";  $result=mysqli_query($con, $sql);
      }
      if($result==true){
        echo '<script>window.location.href="customer.php";</script>';}
      }
      else{
        echo '<script>window.location.href="userlogin.php";</script>';
      }
}
else {
  echo '<script>alert("Login First");
                                     window.location.href="login.php"</script>';
}

?>
