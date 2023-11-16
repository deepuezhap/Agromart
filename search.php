<br><br>
         <?php

         $con=mysqli_connect('localhost','root','','agromart');

         if (isset($_SESSION['user'])){
            $uname = $_SESSION['user'];
      }

      if (isset($_GET['searched'])) {
          $name = $_GET['search'];

            $sql = "SELECT * FROM product where name LIKE '%{$name}%' and stock>0";
            $result=mysqli_query($con, $sql) or die (mysqli_error($con));}

          if(mysqli_num_rows($result)>0){
          while($row = mysqli_fetch_assoc($result)){
            $pro_id=$row['product_id'];

          ?>





          <div class="card">
          <form action="details.php" method="get">
              <button type="submit" name="pro" value="<?php echo $row['product_id'];?>">
            <div class="card-header"><img src="images/<?php echo $row['image']?>" min-width="200" height="200"></div>
            <div class="card-body"><?php echo $row['name'];?></div>
            <div class="card-footer"><p style="color:red">SELLING RATE:<?php echo $row['price'];?></p></div>
          </button></form>
          </div>
        <?php }

}else{ echo"no item found";}
        ?>
