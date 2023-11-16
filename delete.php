<?php
$con=mysqli_connect('localhost','root','','agromart');
$id = $_REQUEST['id'];

$sql="UPDATE login SET status = 0 WHERE user_id='$id' ";
$res=mysqli_query($con,$sql);
            if($res)
            {
                echo "<script>alert('deleted successfully');</script>";
                header("location:viewsel.php"); 
            }
        
            else
                {
                 echo "<script>alert('deletion unsuccessful');</script>";
                }
?>
