<?php
include "sellernavbar.php";
$con=mysqli_connect('localhost','root','','agromart');
$id=$_REQUEST['id'];
$sql1="select * from product where product_id='$id'";


$results=mysqli_query($con,$sql1);
$row=mysqli_fetch_assoc($results);


if(isset($_POST['submit']))
{   
    $id=$_POST['id'];
    $price=$_POST['price'];
    $stock=$_POST['stock'];
    

    $sql2="update product set price='$price',stock='$stock' where product_id='$id'";
    mysqli_query($con,$sql2);
    header("location:viewproduct.php");

    
}
?>
<html>
<head><title>Document</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container mt-3">   
   
   <form action="updatestock.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $id ?>"><br><br>
    Price:<input type="text" class="form-control mt-3" name="price" value="<?php echo $row['price'] ?>"> <br><br>
    Stock:<input type="text"  class="form-control mt-3" name="stock" value="<?php echo $row['stock'] ?>"> <br><br>
    <input type="submit" class="btn btn-primary" name="submit" value="update">
   


</form>
</div>
</body>
</html>