<?php
	session_start();
	error_reporting(0);
	include('include/config.php');
	include('include/checklogin.php');
	check_login();

	//updating Admin Remark
	if(isset($_POST['update']))
	{
		$qid=intval($_GET['id']);
		$reason=$_POST['visit'];
		$query=mysqli_query($conn,"Update appointment SET  ReasonForVisit='$reason' where TRN='$qid'");

		if($query)
		{
			echo "<script>alert('Doctor Remark updated successfully.');</script>";
			echo "<script>window.location.href ='appointment-history.php'</script>";
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Doctor | Appointment Details</title>
		
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
					
				<!-- end: TOP NAVBAR -->
				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle">Doctor | Appointment Details</h1>
								</div>
								<ol class="breadcrumb">
									<li>
										<span>Doctor</span>
									</li>
									<li class="active">
										<span>Appointment Details</span>
									</li>
								</ol>
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: BASIC EXAMPLE -->
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-12">
									<h5 class="over-title margin-bottom-15">Manage <span class="text-bold">Appointment Details</span></h5>
									<table class="table table-hover" id="sample-table-1">
		
										<tbody>
											<?php
												$qid=intval($_GET['id']);
												$sql=mysqli_query($conn,"SELECT * FROM appointment WHERE TRN='$qid'");
												$cnt=1;
												while($row=mysqli_fetch_assoc($sql))
												{
											?>

											<tr>
												<th>Patient TRN</th>
												<td><?php echo $row['TRN'];?></td>
											</tr>

											<tr>
												<th>StaffID</th>
												<td><?php echo $row['StaffID'];?></td>
											</tr>
											<tr>
												<th>Appointment Date / Time</th>
												<td><?php echo $row['Date']."/".$row['Time']?></td>
											</tr>
											<tr>
												<th>Appointment Status</th>
												<td><?php echo $row['Status'];?></td>
											</tr>

											<?php if($row['ReasonForVisit']==""){?>	
											<form name="query" method="post">
												<tr>
													<th>Reason For Visit</th>
													<td><textarea name="visit" class="form-control" required="true"></textarea></td>
												</tr>
												<tr>
													<td>&nbsp;</td>
													<td>	
														<button type="submit" class="btn btn-primary pull-left" name="update">
															Update <i class="fa fa-arrow-circle-right"></i>
														</button>

													</td>
												</tr>
											</form>												
											<?php } else {?>										
											<tr>
												<th>Reason For Visit</th>
												<td><?php echo $row['ReasonForVisit'];?></td>
											</tr>
											
											<?php 
											 }} ?>
											
										</tbody>
									</table>
								</div>
							</div>
								</div>
							</div>
						</div>
						<!-- end: BASIC EXAMPLE -->
						<!-- end: SELECT BOXES -->
						
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
