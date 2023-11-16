
<?php
session_start();
include "sellernavbar.php";
$uid=$_SESSION['uid'];
$con=mysqli_connect('localhost','root','','Agromart');
if(isset($_POST['submit']))
{
    
    $seller_id=$_POST['uid'];
    $name=$_POST['name'];
    $price=$_POST['price'];
    $stock=$_POST['stock'];
    
    $image=$_POST['image'];
    $category_id=$_POST['category_id'];
    $sql1="insert into `product`(`seller_id`,`name`,`price`,`stock`,`image`,`category_id`) 
    values('$seller_id','$name','$price','$stock','$image','$category_id')";
    mysqli_query($con,$sql1);
    header("location:sellernavbar.php");
    
}
?>

<html>
<head><title>Document</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container mt-3">  <br><br><br> <br>

<h2>ADD PRODUCT</h2>
<form action="add product.php" method="POST">
<input type="hidden" name="uid" value="<?php echo $uid ?>"><br><br>
Name:<input type="text" class="form-control mt-3" name="name" required><br><br>
price:<input type="text" class="form-control mt-3" name="price" required><br><br>
stock: <input type="text" class="form-control mt-3" name="stock" required><br><br>

image: <input type="file" class="form-control mt-3" name="image" required><br><br>
<?php
$sql2="SELECT * FROM `category`";
$result2=mysqli_query($con,$sql2);
?>
Category:

        <select name="category_id" class="form-control mt-3" required>
        <option value="">select option</option>
        <?php
        while($row=mysqli_fetch_assoc($result2))
        {
            ?>

        <option value="<?php echo $row['category_id'] ?>"><?php echo $row['name'] ?></option>
            <?php
        }
        ?>
        </select><br><br>
<input type="submit" class="btn btn-primary" name="submit" value="submit">
</form>
    </div>
</body>
</html>