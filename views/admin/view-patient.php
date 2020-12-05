<?php
	session_start();
	error_reporting(0);
	include('include/config.php');
	include('include/checklogin.php');
	check_login();
	$vid=intval($_GET['id']);// get doctor id
	

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Doctor | Manage Patients</title>
		
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
		<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
		<link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
	</head>
	<body>
		<div id="app">		
			<?php include('include/sidebar.php');?>
			<div class="app-content">
				<?php include('include/header.php');?>
				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle">Doctor | Manage Patients</h1>
								</div>
								<ol class="breadcrumb">
									<li>
										<span>Doctor</span>
									</li>
									<li class="active">
										<span>Manage Patients</span>
									</li>
								</ol>
							</div>
						</section>
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-12">
									<h5 class="over-title margin-bottom-15">Manage <span class="text-bold">Patients</span></h5>
									<?php
										//create connection
										include('include/config.php');

										$selQuery = "SELECT * FROM patient WHERE TRN='$vid'";
										$ret=mysqli_query($conn,$selQuery) or die("Could not find database record(s)".mysqli_error($conn));
										
										$cnt=1;
										while ($row=mysqli_fetch_assoc($ret)) {
                               		?>
									<table border="1" class="table table-bordered">
										<tr align="center">
											<td colspan="4" style="font-size:20px;color:blue">
												Patient Details
											</td>
										</tr>

										<tr>
											<th scope>Patient TRN</th>
											<td><?php  echo $row['TRN'];?></td>
											<th>Patient Title</th>
											<td><?php  echo $row['Title'];?></td>
										</tr>
										<tr>
											<th scope>Patient First Name</th>
											<td><?php  echo $row['FirstName'];?></td>
											<th scope>Patient Last Name</th>
											<td><?php  echo $row['LastName'];?></td>
										</tr>
										<tr>
											<th scope>Patient D.O.B.</th>
											<td><?php  echo $row['DOB'];?></td>
											<th scope>Patient Email</th>
											<td><?php  echo $row['Email'];?></td>
										</tr>
										<tr>
											<th scope>Patient Mobile Number</th>
											<td><?php  echo $row['TelNo'];?></td>
											<th>Patient Address</th>
											<td><?php  echo $row['Address'];?></td>
										</tr>
										
										<tr>
		
											<th>Patient Medical History(if any)</th>
											<td><?php  echo $row['PatientMedhis'];?></td>
											<th>Patient Reg Date</th>
											<td><?php  echo $row['CreationDate'];?></td>
										</tr>
	
										<?php }?>
									</table>
                          
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
		</div>
		<!-- start: FOOTER -->
		<?php include('include/footer.php');?>
		<!-- end: FOOTER -->
		
		<!-- start: SETTINGS -->
		<?php include('include/setting.php');?>
			
			<!-- end: SETTINGS -->
		</div>
		<!-- start: MAIN JAVASCRIPTS -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
		<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
		<script src="vendor/autosize/autosize.min.js"></script>
		<script src="vendor/selectFx/classie.js"></script>
		<script src="vendor/selectFx/selectFx.js"></script>
		<script src="vendor/select2/select2.min.js"></script>
		<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="assets/js/main.js"></script>
		<!-- start: JavaScript Event Handlers for this page -->
		<script src="assets/js/form-elements.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});
		</script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>
