<!DOCTYPE html>
<html>
	<head>
		<title> Avocado Medical Centre</title>
		<link href="images/logo.png" rel="icon" type="images/png" />
		<link href="css/style.css"  rel="stylesheet" type="text/css" media="all"/>
		<link href="http://fonts.googleapis.com/css?family=Ropa+Sans" rel="stylesheet"type="text/css"/>
		<link href='http://fonts.googleapis.com/css?family=Ropa+Sans' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/responsiveslides.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script src="js/responsiveslides.min.js"></script>
		<script>
			//execute function() on page load
			$(function(){
				
				//carousel slideshow
				$("#slider1").responsiveSlides({
					maxwidth: 1600,
					speed: 600
				});
			});
		</script>
	</head>
	<body>
		<?php
			include('header.php');
		?>
		<div class="clear"></div>
		
		<div class="carousel">
			<ul class="rslides" id="slider1">
				<li><img src="images/slider-image1.jpg" alt=""></li>
				<li><img src="images/slider-image2.jpg" alt=""></li>
				<li><img src="images/slider-image1.jpg" alt=""></li>
			</ul>
		</div>
		<div class="clear"></div>
		
		<div class="content-grids">
			<div class="wrap">
				<div class="section group">
					<div class="listview_1_of_3 images_1_of_3">
						<div class="listimg listimg_1_of_2">
						  <img src="images/grid-img3.png">
						</div>
						<div class="text list_1_of_2">
							<h3>Patients</h3>
							<p>Register </p>
							<!--<div class="button"><span><a href="views/addpatient.php">Click Here</a></span></div>-->
							<div class="button"><span><a href="#">Click Here</a></span></div>
						</div>
					</div>
					<div class="listview_1_of_3 images_1_of_3">
						<div class="listimg listimg_1_of_2">
							  <img src="images/grid-img1.png">
						</div>
						<div class="text list_1_of_2">
							  <h3>Nurse Login</h3>
							
							  <div class="button"><span><a href="views/nurse/">Click Here</a></span></div>
						</div>
					</div>
					<div class="listview_1_of_3 images_1_of_3">
						<div class="listimg listimg_1_of_2">
							  <img src="images/grid-img1.png">
						</div>
						<div class="text list_1_of_2">
							  <h3>Doctors Login</h3>
							
							  <div class="button"><span><a href="views/doctor/">Click Here</a></span></div>
						</div>
					</div>
					
					<div class="listview_1_of_3 images_1_of_3">
						<div class="listimg listimg_1_of_2">
							  <img src="images/grid-img2.png">
						</div>
						<div class="text list_1_of_2">
							  <h3>Admin Login</h3>
							
							  <div class="button"><span><a href="views/admin/">Click Here</a></span></div>
						 </div>
					</div>	
				</div>
			</div>
		</div>
		<div class="wrap">
			<div class="content-box">
				<div class="section group">
					
				</div>
			</div>
		</div>
		<br />
		<div class="clear"> </div>
		<?php
			include('footer.php');
		?>
		<div class="clear"></div>
	</body>
<html>