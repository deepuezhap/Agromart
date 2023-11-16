<?php 
include "adminnavbar.php";
$con=mysqli_connect('localhost','root','','agromart');//connect to database
$query="select * from category "; // selecting sellers from user table
$result=mysqli_query($con,$query); 
?> 
<!DOCTYPE html> 
<html> 
	<head> 
		<title> Category details </title> 
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
	</head> 
	<body> 
	<br><br><br><br>
	<div class="container mt-3">
	
	<table  class="table table-striped"> 
	<tr> 
		<th colspan="8"><h2><center>Category details</center></h2></th>

		</tr> 
			  <th> ID </th> 
			  <th> Name </th> 

              <th > Action </th> 
              
              
			  
		</tr> 
		
		<?php while($rows=mysqli_fetch_array($result)) 
		{ 
		?> 
		<td><?php echo $rows['category_id']; ?></td>
		<td><?php echo $rows['name']; ?></td>

        <td> <a href="deletecat.php?id=<?php echo $rows['category_id'];?>">Delete</a></td>
        </tr> 
	     <?php 
               } 
          ?> 

	</table> 
			</div>
   
	</body> 
	</html>