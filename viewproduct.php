<?php
session_start();
include "sellernavbar.php";
$con=mysqli_connect('localhost','root','','agromart');
$uid=$_SESSION['uid'];
$sql="select * from product where seller_id='$uid'";
$result=mysqli_query($con,$sql);
?> 
<!DOCTYPE html> 
<html> 
	<head> 
		<title>display product details</title> 
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
	</head> 
	<body> <br><br><br><br>
	<div class="container mt-3">
	<table class="table table-striped"> 
	<tr> 
		<th colspan="8"><h2><center>Product details</center></h2></th>

		</tr> 
        <th>Product id</th>
		<th>Name</th> 
		<th>Price</th> 
        <th>Stock</th>
        <th>Category id</th>
        <th colspan="2"> <center>Action</center> </th> 
              
              
			  
		</tr> 
		
		<?php while($rows=mysqli_fetch_array($result)) 
		{ 
		?> 
		<tr> <td><?php echo $rows['product_id']; ?></td> 
		<td><?php echo $rows['name']; ?></td>
		<td><?php echo $rows['price']; ?></td> 
		<td><?php echo $rows['stock']; ?></td> 
    <td><?php echo $rows['category_id']; ?></td>

        <td> <a href="updatestock.php?id=<?php echo $rows['product_id'];?>">update stock</a></td>
        <td> <a href="deleteproduct.php?id=<?php echo $rows['product_id'];?>">Delete</a></td>
        </tr> 
	     <?php 
               } 
          ?> 

	</table> 
			</div>
    
	</body> 
	</html>