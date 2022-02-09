<?php

include 'connection.php';

  
include "include/header.php";

?>
	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20">
			<div class="card-box pd-20 height-100-p mb-30">
				<div class="row align-items-center">
					<div class="col-md-4">
						<img src="vendors/images/ipl.jpg" alt="">
					</div>
					<div class="col-md-8">
						<h4 class="font-20 weight-500 mb-10 text-capitalize">
							Welcome To <div class="weight-600 font-30 text-blue">IPL MANAGEMENT</div>
						</h4>
						
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-6 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="chart"></div>
							</div>
							<?php 
                                $sql="SELECT * FROM team";
                                $result=db_query($sql);
                                $row=mysqli_num_rows($result);
                                
                                ?>
							<div class="widget-data">
								<div class="h4 mb-0"><?php echo $row;?></div>
								<div class="weight-600 font-14">Teams</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-6 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="chart2"></div>
							</div>
							<?php 
                                $sql="SELECT * FROM player";
                                $result=db_query($sql);
                                $row=mysqli_num_rows($result);
                                
                                ?>
							<div class="widget-data">
								
								<div class="h4 mb-0"><?php echo $row;?></div>
								<div class="weight-600 font-14">Players</div>
							</div>
						</div>
					</div>
				</div>

				
				
			
	<?php include "include/footer.php";?>