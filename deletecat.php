<?php
$con=mysqli_connect('localhost','root','','agromart');
$id = $_REQUEST['id'];

$sql="DELETE FROM `category` WHERE category_id='$id'";
$res=mysqli_query($con,$sql);
            if($res)
            {
               
                header("location:catdis.php"); 
            }
        
            else
                {
                 echo "<script>alert('deletion unsuccessful');</script>";
                }
?>
