<?php 
include "admin/connection.php";
$id=$_GET['id'];
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
<div class="jumbotron mt-5" style="background-color: #000000;">
  <h1 class="text-center text-warning font-italic" style="font-size:80px;">Teams Details</h1>
  <p class="text-center text-primary font-italic" style="font-size:40px;">Indian Premier League</p>
</div>

</header>
<section>
  <div class="container-fluid">
    <h1 class="text-center text-capitalized font-italic text-success pt-5">Teams</h1>
    <hr class="w-25 mx-auto pt-5">
    <?php
 
    $query1="select * from team where id='$id' ";

    $result=db_query($query1);
     $row=mysqli_fetch_assoc($result);
     $query2="select * from player where id='$row[top_batsman]'";
     $result1=db_query($query2);
     $row1=mysqli_fetch_assoc($result1);
    
    $query3="select * from player where id='$row[top_bowler]'";
     $result2=db_query($query3);
     $row2=mysqli_fetch_assoc($result2);
        ?>
    <div class="row mb-5">
      <div class="col-lg-6 col-md-6 col-12"> 
        <img src="admin/upload/<?php echo $row['image']?>" class="img-fluid" style="width: 500px;height:500px;border-radius: 50px 50px 50px 50px;">

      </div><!-- for image -->
      <div class="col-lg-6 col-md-6 col-12">
        <h2 class="heading font-italic text-primary">Team Details</h2>
        <hr class="w-25  pt-5">
        <h4 class="team mt-5"> Team Name: <?php echo $row['name']?></h4>
        <h4 class="ply mt-2"> Player Number: <?php echo $row['player_count']?></h4>
        <h4 class="topbatsman mt-2"><img src="image/bat.png">Top Batsman: <?php echo $row1['name']?></h4>
        <h4 class="topbowler mt-2"><img src="image/ball.png">Top Bowler: <?php echo $row2['name']?></h4>
        <h4 class="championship mt-2"><img src="image/trophy.png">Championship Won: <?php echo $row['championship_no']?></h4>
       
       
       </div> 
      
    </div>
    
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="title text-center mt-5 ">
          <h2>Players</h2>
        </div>
      </div>
      <?php
$query1="select * from player where team='$id'";
$result=db_query($query1);
while($row=mysqli_fetch_assoc($result)){
   $sqlfetch2 = "SELECT * FROM team where id='$row[team]'";
    $sqlfetch2 = db_query($sqlfetch2);
     $row2 = mysqli_fetch_array($sqlfetch2);

?>
  <ul style="list-style-type: none;">
      
  <li>
      <div class="player">
        <a href="single-player.php?id=<?php echo $row['id']?>" style="text-decoration: none;">
            <strong><?php echo $row['name']?></strong>
        <img src="admin/upload/<?php echo $row['image']?>" alt="" style="width: 200px;height: 200px;">
        <div class="button-player">
            <p style="color:#0000ff">Team:<?php echo $row2['name']?></p>
            <p style="color:#0000ff">Price:<?php echo $row['price']?></p>
            <p style="color:#0000ff">Status:<?php echo $row['status']?></p>
            <p style="color:#0000ff">Role:<?php echo $row['role']?></p>
           <a href="single-player.php?id=<?php echo $row['id']?>" class="ply-btn">Details</a>
 
    </div>
  </li>

  
 </ul>

<?php } ?>
</div>
</div>



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