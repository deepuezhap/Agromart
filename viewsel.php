<?php 
include "adminnavbar.php";
$con=mysqli_connect('localhost','root','','agromart');//connect to database
$query="select * from user,login where user.user_id = login.user_id and login.role='seller' "; // selecting sellers from user table
$result=mysqli_query($con,$query); 
?> 
<!DOCTYPE html> 
<html> 
	<head> 
		<title> Seller details </title> 
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
	</head> 
	<body> 
	<br><br><br><br>
	<div class="container mt-3">
	
	<table  class="table table-striped"> 
	<tr> 
		<th colspan="8"><h2><center>Seller details</center></h2></th>

		</tr> 
			  <th> ID </th> 
			  <th> Name </th> 
              <th> Address </th>
              <th> phone number </th>
			  <th> Email </th>
              <th> Status </th>
              <th colspan="2"> <center>Action </center></th> 
              
              
			  
		</tr> 
		
		<?php while($rows=mysqli_fetch_array($result)) 
		{ 
		?> 
		<tr> <td><?php echo $rows['user_id']; ?></td> 
		<td><?php echo $rows['fname']." ".$rows['lname']; ?></td>
		<td><?php echo $rows['address']; ?></td> 
		<td><?php echo $rows['ph_no']; ?></td> 
        <td><?php echo $rows['email']; ?></td>
        <td><?php  if($rows['status']==1)
        {
            echo "Approved";

        }
        else
        {
            echo "Pending";
        } ?></td>
        <td> <a href="approve.php?id=<?php echo $rows['user_id'];?>">Approve</a></td>
        <td> <a href="delete.php?id=<?php echo $rows['user_id'];?>">Delete</a></td>
        </tr> 
	     <?php 
               } 
          ?> 

	</table> 
			</div>
   
	</body> 
	</html>