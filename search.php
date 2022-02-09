<?php 
include "admin/connection.php";

$search=$_POST['search'];

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>IPL</title>
	
	
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #0060b0;">
  <a class="navbar-brand" href="index.php"><img src="image/logo.jpg" alt="Logo" style="width:50px;"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" action="search.php" method="POST">
      <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-success" type="submit">Search</button>
    </form>

    <a href="admin/index.php"><button class="btn btn-warning ml-2">Add</button></a>
  </div>
</nav>

<div id="demo" class="carousel slide" data-ride="carousel">

  
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  
 
  <div class="carousel-inner ">
    <div class="carousel-item active">
      <img src="image/banner1.jpg" alt="homepagecar" style="height:100%;width:100;max-height: 500px;">
      <div class="carousel-caption text-center">
            </div>   
    </div>
    <div class="carousel-item ">
      <img src="image/banner2.jpg" alt="carwash2" style="height:100%;width:100;max-height: 500px;">
      <div class="carousel-caption text-center">
     
      </div>   
    </div>
    <div class="carousel-item ">
      <img src="image/banner3.jpg" alt="detailing" style="height:100%;width:100;max-height: 500px;">
      <div class="carousel-caption text-center">
        
      </div>   
    </div>
  </div>
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
<section class="section">

<div class="container">
    <div class="row">
      <div class="col-12">
        <div class="title text-center mt-5">
          <h2>Teams</h2>
        </div>
      </div>
  
<div class="row">
	<?php
$query1="SELECT * FROM team
      WHERE (`name` LIKE '%".$search."%')";
$result=db_query($query1);
while($row=mysqli_fetch_assoc($result)){
	

?>
	<div class="col-md-4 mb-5">
  <div class="card">
    <img class="card-img-top" src="admin/upload/<?php echo $row['image']?>">
    <div class="card-body">
      <h4 class="card-title"><?php echo $row['name']?></h4>
      
      <a href="single-team.php?id=<?php echo $row['id']?>" class="btn btn-primary">Details</a>
    </div>
  </div>
  
  </div>
  <?php } ?>
</div>

</div>
</div>

</section>

<section class="section">
	<div class="container">
    <div class="row">
      <div class="col-12">
        <div class="title text-center ">
          <h2>Players</h2>
        </div>
      </div>
      <?php
$query1="SELECT * FROM player
      WHERE (`name` LIKE '%".$search."%')";
$result=db_query($query1);
while($row=mysqli_fetch_assoc($result)){
	 $sqlfetch2 = "SELECT * FROM team where id='$row[team]'";
    $sqlfetch2 = db_query($sqlfetch2);
     $row2 = mysqli_fetch_array($sqlfetch2);

?>
    <ul>
      
  <li>
      <div class="player">
        <a href="single-player.php?id=<?php echo $row['id']?>" style="text-decoration: none;">
            <strong><?php echo $row['name']?></strong>
        <img src="admin/upload/<?php echo $row['image']?>" alt="">
        <div class="button-player">
            <p>Team:<?php echo $row2['name']?></p>
            <p>Price:<?php echo $row['price']?></p>
            <p>Status:<?php echo $row['status']?></p>
            <p>Role:<?php echo $row['role']?></p>
           <a href="single-player.php?id=<?php echo $row['id']?>" class="ply-btn">Details</a>
 
    </div>
  </li>

  
 </ul>

<?php } ?>
</div>
</div>



</section>

      
    </div> <!-- end row -->
  </div> <!-- end container -->

	
</section>

<footer>
  <div class="col-md-12">
  <h3 class="ftr">copyrights@2022 // Designed by Bikash Das</h3>
</div>
</footer>



  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/js/lightslider.min.js" integrity="sha512-Gfrxsz93rxFuB7KSYlln3wFqBaXUc1jtt3dGCp+2jTb563qYvnUBM/GP2ZUtRC27STN/zUamFtVFAIsRFoT6/w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  
  </body>
  </html>