<?php
$con=mysqli_connect('localhost','root','','agromart');
$id = $_REQUEST['id'];
$sql="DELETE FROM `product` WHERE product_id='$id'";
$res=mysqli_query($con,$sql);
            if($res)
            {
                echo "<script>alert('deleted successfully');</script>";
                header("location:viewproduct.php"); 
            }
        
            else
                {
                 echo "<script>alert('deletion unsuccessful');</script>";
                }
?>
