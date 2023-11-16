<?php
$con=mysqli_connect('localhost','root','','agromart');
$id = $_REQUEST['id'];//$id is assigned with id from view seller
$sql="UPDATE login SET status = 1 WHERE user_id='$id'";

$res=mysqli_query($con,$sql);
            if($res)
            {
                echo "<script>alert('Approved successfully')</script>";
                header("location:viewsel.php"); 
            }
        
            else
                {
                 echo "<script>alert('Approval unsuccessful');</script>";
                }

?>

