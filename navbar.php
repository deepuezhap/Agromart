<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
  <?php
  session_start();
  if(isset($_SESSION['uid']))
  {
     ?>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top" >
  <div class="container-fluid">
    <a class="navbar-brand" href="customer.php">Agromart</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav me-auto">
      <li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Category</a>
  <ul class="dropdown-menu">
  <?php
    $con=mysqli_connect('localhost','root','','agromart');


    $sql = "SELECT * FROM category  ";

    $re=mysqli_query($con, $sql) or die (mysqli_error($con));

    if(mysqli_num_rows($re)>0){
    while($r = mysqli_fetch_assoc($re)){
    $sub = $r['category_id'];
    $nam = $r['name'];


    ?>
    <form action="char.php" method="get"
    <li class="bt1"><button  name="subchar"  id="subchar" type="submit" type="button"  value="<?php echo $sub;?>"><?php echo $nam;?></button></li></form>
<?php }}?>
  </ul>
</li>
<li class="nav-item">
<a class="nav-link" href="orderhistory.php">Order History</a>

</li>
        <li class="nav-item">
      <a class="nav-link" href="cart.php">Cart</a>

      </li>
      <li class="nav-item">
      <a class="nav-link" href="updatecustomer.php?id=<?php echo $_SESSION['uid'] ?>">update details</a>
      </li>
      
      <li class="nav-item">
      <a class="nav-link" href="logout.php">Logout</a>

      </li>

      </ul>
      <form class="d-flex" method="GET" action="searchhead.php">
        <input class="form-control me-2" name="search" type="text" placeholder="Search">
        <button class="btn btn-primary" name="searched" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
<br><br><br><br>
  <?php
  }
  else{
    ?>

<nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="customer.php">Agromart</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav me-auto">
      <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Category</a>
  <ul class="dropdown-menu">
  <?php
    $con=mysqli_connect('localhost','root','','agromart');


    $sql = "SELECT * FROM category  ";

    $re=mysqli_query($con, $sql) or die (mysqli_error($con));

    if(mysqli_num_rows($re)>0){
    while($r = mysqli_fetch_assoc($re)){
    $sub = $r['category_id'];
    $nam = $r['name'];


    ?>
    <form action="char.php" method="get"
    <li class="bt1"><button  name="subchar"  id="subchar" type="submit" type="button"  value="<?php echo $sub;?>"><?php echo $nam;?></button></li></form>
<?php }}?>
  </ul>
</li>

        <li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="signup.php">Signup</a>
        </li>


      </ul>
      <form class="d-flex" method="GET" action="searchhead.php">
        <input class="form-control me-2" name="search" type="text" placeholder="Search">
        <button class="btn btn-primary" name="searched" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
<br><br><br><br>
<?php }?>
