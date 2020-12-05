<?php
	session_start();
	error_reporting(0);
	include('include/config.php');
	include('include/checklogin.php');
	check_login();

	if(isset($_SESSION['errflag']))
	{
		foreach($_SESSION as $key => $value)
		{
			$$key = $value;
		}
		//session_destroy();
	}
	else{
		//default variables
		$patfname = $patlname = $patcontact = $patemail = "";
		$pattitle = $pattrn = $pataddress = $patdob = "";
		
		//default error messages
		$errFName = $errLName = $errContact = $errEmail = "";
		$errTitle = $errTRN = $errAddress = $errDOB = "";

		session_destroy();
	}

	if(isset($_GET['check']))
	{
		echo "<script>alert('Patient info added Successfully');</script>";
		header('location: manage-patient.php');
	}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Doctor | Add Patient</title>
		
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

		<script>
			function userAvailability() {
			$("#loaderIcon").show();
			jQuery.ajax({
			url: "check_availability.php",
			data:'email='+$("#patemail").val(),
			type: "POST",
			success:function(data){
			$("#user-availability-status1").html(data);
			$("#loaderIcon").hide();
			},
			error:function (){}
			});
			}
		</script>
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
								<h1 class="mainTitle">Patient | Add Patient</h1>
							</div>
							<ol class="breadcrumb">
								<li>
								<span>Patient</span>
								</li>
								<li class="active">
								<span>Add Patient</span>
								</li>
							</ol>
						</div>
					</section>
					<div class="container-fluid container-fullw bg-white">
					<div class="row">
						<div class="col-md-12">
							<div class="row margin-top-30">
								<div class="col-lg-8 col-md-12">
									<div class="panel panel-white">
										<div class="panel-heading">
											<h5 class="panel-title">Add Patient</h5>
										</div>
										<div class="panel-body">
											<form role="form" name="" method="post" action="doc_validation.php">
												<div class="form-group">
													<label for="doctorname">
														Patient TRN
													</label>
													<input type="text" name="pattrn" value="<?php echo $pattrn; ?>" class="form-control"  placeholder="Enter Patient TRN" required="true">
													<?php echo $errTRN; ?>
												</div>
												<div class="form-group">
													<label for="doctorname">
														Patient First Name
													</label>
													<input type="text" name="patfname" class="form-control" value="<?php echo $patfname; ?>" placeholder="Enter Patient First Name" required="true">
													<?php echo $errFName; ?>
												</div>
												<div class="form-group">
													<label for="doctorname">
														Patient Last Name
													</label>
													<input type="text" name="patlname" class="form-control" value="<?php echo $patlname; ?>" placeholder="Enter Patient Last Name" required="true">
													<?php echo $errLName; ?>
												</div>
												<div class="form-group">
													<label for="fess">
														Patient D.O.B.
													</label>
													<input type="Date" name="patdob" class="form-control" value="<?php echo $patdob; ?>" placeholder="Enter Patient D.O.B." required="true">
													<?php echo $errDOB; ?>
												</div>
												<div class="form-group">
													<label for="contact">
														Patient Contact no
													</label>
													<input type="text" name="patcontact" class="form-control" value="<?php echo $patcontact; ?>" placeholder="Enter Patient Contact no" required="true" maxlength="10" pattern="[0-9]+">
													<?php echo $errContact; ?>
												</div>
												<div class="form-group">
													<label for="fess">
														Patient Email
													</label>
													<input type="email" id="patemail" name="patemail" class="form-control" value="<?php echo $patemail; ?>" placeholder="Enter Patient Email id" required="true" onBlur="userAvailability()">
													<span id="user-availability-status1" style="font-size:12px;"></span>
													<?php echo $errEmail; ?>
												</div>
												<div class="form-group">
													<label class="block">
														Title
													</label>
													<div class="clip-radio radio-primary">
														<select id="pattitle" name="pattitle">
															<option value="" <?php if($pattitle == '') {echo "selected";} ?>>-- Please select Patient Title --</option>
															<option value="Dr." <?php if($pattitle == 'Dr.') {echo "selected";} ?>>Dr.</option>
															<option value="Miss" <?php if($pattitle == 'Miss') {echo "selected";} ?>>Miss</option>
															<option value="Mr." <?php if($pattitle == 'Mr.') {echo "selected";} ?>>Mr.</option>
															<option value="Mrs." <?php if($pattitle == 'Mrs.') {echo "selected";} ?>>Mrs.</option>
															<option value="Ms." <?php if($pattitle == 'Ms.') {echo "selected";} ?>>Ms.</option>
															<option value="Pastor" <?php if($pattitle == 'Pastor') {echo "selected";} ?>>Pastor</option>
															<option value="Professor" <?php if($pattitle == 'Professor') {echo "selected";} ?>>Professor</option>
														</select>
														<?php echo $errTitle; ?>
													</div>
												</div>
												<div class="form-group">
													<label for="address">
														Patient Address
													</label>
													<textarea name="pataddress" class="form-control" value="<?php echo $pataddress; ?>" placeholder="Enter Patient Address" required="true"></textarea>
													<?php echo $errAddress; ?>
												</div>

												<button type="submit" name="addpatsubmit" id="submit" class="btn btn-o btn-primary">
													Add
												</button>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-12 col-md-12">
							<div class="panel panel-white">
							</div>
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
