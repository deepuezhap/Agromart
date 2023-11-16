<?php
session_start();
$uid=$_SESSION['uid'];


?>
<html lang="en">
<head>
    
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body> 
<nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top" >
  <div class="container-fluid">
    <a class="navbar-brand" href="sellernavbar.php"><?php echo "Hello , " . $_SESSION['user']; ?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav me-auto">
      
<li class="nav-item">
<a class="nav-link" href="add product.php">Add products</a>
</li>
<li class="nav-item">
        <a  class="nav-link" href="updateseller.php?id=<?php echo $uid ?>">update details</a>
        </li>
        <li class="nav-item">
        <a  class="nav-link" href="viewproduct.php">View products</a>
        </li>  
        <li class="nav-item">
        <a  class="nav-link" href="logout.php">Logout</a>
        </li> 
       

      </ul>
      
    </div>
  </div>
</nav>

</body>
</html>