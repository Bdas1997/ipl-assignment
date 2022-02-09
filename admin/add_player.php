<?php

include 'connection.php';

  
include "include/header.php";
$name=$connect->real_escape_string($_POST['name']);
$team=$connect->real_escape_string($_POST['team']);
$price=$connect->real_escape_string($_POST['price']);
$status=$connect->real_escape_string($_POST['status']);
$role=$connect->real_escape_string($_POST['role']);



$allowed_extensions = array('gif','pdf','doc','docx','dot','dotx', 'jpg','xls','xlsb','xlam','ods','jpeg', 'png','bmp', 'GIF', 'JPG', 'PNG', 'JPEG','BMP','jfif');
$stage = $_POST['stage'];

if ($stage == 2) {

    if ($_FILES['pimg']['name'] != "") {

        $filenamenew = $_FILES['pimg']['name'];

        $path_info = pathinfo($filenamenew);

        $is_valid = in_array($path_info['extension'], $allowed_extensions);

        if (empty($is_valid)) {
            $msg = "Incorrent file extension, Please upload a valid image file";
            setcookie("msg", $msg, time() + 3);
            print "<script>";
            print "self.location = 'add_player.php';";
            print "</script>";
            exit;
        } else {

            $path2 = "upload";
             $s1 = rand();
            $realname = $_FILES['pimg']['name'];
            $realname = $s1 . "_" . $realname;
            $dest = $path2 . "/" . $realname;
            copy($_FILES['pimg']['tmp_name'], $dest);
            $image = trim($realname);
            $path3 = "upload";
            $delpath1 = $path3 . "/" . $_POST['T2'];
            @unlink($delpath1);

        }

    } else {
        
        $image = $connect->real_escape_string(trim($_POST['T2']));

    }


// print_r($stage);
// die();
  $sql="INSERT INTO `player`( `name`, `image`, `team`, `price`, `status`, `role`) VALUES ('$name','$image','$team','$price','$status','$role')";
// print_r($sql);
// die();
       $result3 = db_query($sql);
      
    $msg = "Player Added Successfully.";
    setcookie("msg", $msg, time() + 3);
    print "<script>";
    print "self.location = 'add_player.php';";
    print "</script>";
    exit;
}
/* EDIT Template */

if ($_POST['stage'] == 3 && $_POST['rid'] != "") {
    
    if ($_FILES['pimg']['name'] != "") {
        $filenamenew = $_FILES['pimg']['name'];
        $path_info = pathinfo($filenamenew);
        $is_valid = in_array($path_info['extension'], $allowed_extensions);
        if (empty($is_valid)) {
          $msg = "Incorrent file extension, Please upload a valid image file";
            setcookie("msg", $msg, time() + 3);
            print "<script>";
            print "self.location = 'add_player.php';";
            print "</script>";
            exit;
        } else {

    $path2 = "upload";
            $s1 = rand();
            $realname = $_FILES['pimg']['name'];
            $realname = $s1 . "_" . $realname;
            $dest = $path2 . "/" . $realname;
            copy($_FILES['pimg']['tmp_name'], $dest);
            $image = trim($realname);
            $path3 = "upload";
            $delpath1 = $path3 . "/" . $_POST['T2'];
            @unlink($delpath1);
        }



    } else {



        $image = $connect->real_escape_string(trim($_POST['T2']));

    }
    
    
    $sql="UPDATE `player` SET `name`='$name',`image`='$image',`team`='$team',`price`='$price',`status`='$status',`role`='$role' WHERE id=" . $_POST['rid'] . "";
// print_r($sql);
// die();
  $result3 = db_query($sql);
  //include('pagemanipulate.php');
    $msg = "Player Updated Successfully.";
    setcookie("msg", $msg, time() + 3);
    print "<script>";
    print "self.location = 'mng_player.php';";
    print "</script>";
    exit;
}

if ($_GET['id'] != "") {
    $sql = "select * from player where id=" . $_GET['id'] . "";
    
    $row = mysqli_fetch_assoc(db_query($sql));
  
  $eid = $row['id'];
}

$page="player";

?>
	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>ADD PLAYERS</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">ADD PLAYERS</li>
								</ol>
							</nav>
						</div>
						
					</div>
				</div>

				<div class="pd-20 card-box mb-30">
					<div class="clearfix mb-20">
						<div class="pull-left">
							<h4 class="text-blue h4">Add Players</h4>
						</div>
					</div>
					<div class="row">
						<div class=" col-sm-12">
                        <form method="POST" action="" enctype="multipart/form-data">
							<?php if ($eid == "") { ?>
                           <input type="hidden" name="stage" value="2">
                           <?php } else { ?>
                           <input type="hidden" name="stage" value="3">
                          <input type="hidden" name="rid" value="<?php print $eid; ?>">
                         <?php } ?>
                             <!--message-->
                            <?php if ($_COOKIE['msg1']) { ?>
                             <div class="clearfix"></div>
                             <div class="col-lg-8">        
                            <div class="alert alert-success">
                          <a href="#" class="close" data-dismiss="alert" onClick="$('.alert').hide('slow');">&times;</a>
                         <?php print str_replace("+", " ", $_COOKIE['msg1']); ?>
                        </div>
                        </div>
                         <?php } ?>
                          <!--message--> 
								<div class="form-group">
									<label>Player Name</label>
									<input class="form-control" placeholder="Enter Player Name" name="name" type="text"  value="<?php print $row['name'];?>" required>
								</div>
								<div class="form-group">
									<label>Player Image</label>
									<input class="form-control" type="file" name="pimg"  >
								</div>
                                <?php if ($row['image'] != "") { ?>

                                 <div class="clearfix"></div>

                                <div class="form-row">

                                <img src="upload/<?php print $row['image']; ?>" style="width: 200px;height:200px;" 
class="img-responsive" />  

                                </div>

                                <?php } ?>

                                <input type="hidden" name="T2" value="<?php print $row['image']; ?>">
								<div class="form-group">
									<label>Team</label>
									<select class="form-control" type="text" name="team"  required>
										<option>Choose Team</option>
                                        <?php  
                                         $sql2 = "select * from team";
                                          $res1=db_query($sql2);
                                           while($row12 = mysqli_fetch_assoc($res1)){
                  
                                         if($row['team']==$row12['id']){
                                         ?>
           
                                       <option value="<?php echo $row12['id'];?>" selected><?php echo $row12['name'];?></option>
                                        <?php }
                                          else{
                                           ?>
              
                                         <option value="<?php echo $row12['id'];?>" ><?php echo $row12['name'];?></option>
                                         <?php }}?> 
									</select>
								</div>
								
								<div class="form-group">
									<label>Price</label>
									<input class="form-control" type="text" name="price" value="<?php print $row['price'];?>" required>
								</div>
                                <div class="form-group">
									<label>Status</label>
									<select class="form-control" type="text" name="status"  required>
										<option>Select One..</option>
                                        <option  value="Playing"<?php echo $row['status'] == 'Playing' ? 'selected':'';?>>Playing</option>
                                        <option  value="On-Bench"<?php echo $row['status'] == 'On-Bench' ? 'selected':'';?>>On-Bench</option>
									</select>
								</div>
                                <div class="form-group">
									<label>Role</label>
									<select class="form-control" type="text" name="role"  required>
                                    <option>Select One..</option>
                                        <option  value="Batsman"<?php echo $row['role'] == 'Batsman' ? 'selected':'';?>>Batsman</option>
                                        <option  value="Bowler"<?php echo $row['role'] == 'Bowler' ? 'selected':'';?>>Bowler</option>
                                        <option  value="All-Rounder"<?php echo $row['role'] == 'All-Rounder' ? 'selected':'';?>>All-Rounder</option>
									</select>
								</div>
								<div>
									<button type="submit" name="submit" class="btn btn-success">Submit</button>
								</div>
							</form>
						</div>
					
						
					</div>
				</div>
				
				

			</div>
				
	<?php include "include/footer.php";?>