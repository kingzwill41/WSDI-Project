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
		
		//default error messages
		$errFName = $errLName = $errContact = $errEmail = "";
		$errTitle = $errAddress = $errDOB = "";

		session_destroy();
	}

	if(isset($_GET['updated']))
	{
		echo "<script>alert('Patient info updated Successfully');</script>";
		header('location: manage-patient.php');

	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Doctor | Edit Patient</title>
		
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
									<h1 class="mainTitle">Patient | Edit Patient</h1>
								</div>
								<ol class="breadcrumb">
									<li>
										<span>Patient</span>
									</li>
									<li class="active">
										<span>Edit Patient</span>
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
													<h5 class="panel-title">Edit Patient</h5>
												</div>
											<div class="panel-body">
											<form role="form" name="" method="post" action="doc_validation.php">
												<?php
													//create connection
													include('include/config.php');

													$_SESSION['TRN'] = $eid=$_GET['id'];

													//write query string
													$selQuery = "SELECT * FROM patient WHERE TRN = '$eid'";
													
													//run query
													$results = mysqli_query($conn,$selQuery) or die("Could not find database record(s)".mysqli_error($conn));

													$cnt=1;
													while ($row=mysqli_fetch_assoc($results)) 
													{

												?>
												<div class="form-group">
													<label for="fess">
														TRN
													</label>
													<input type="text" class="form-control"  value="<?php  echo $row['TRN'];?>" readonly='true'>
												</div>
												<div class="form-group">
													<label for="fess">
														Staff ID
													</label>
													<input type="text" class="form-control"  value="<?php  echo $row['StaffID'];?>" readonly='true'>
												</div>
												<div class="form-group">
													<label for="doctorname">
														First Name
													</label>
													<input type="text" name="patfname" class="form-control"  value="<?php  echo $row['FirstName'];?>" required="true">
													<?php echo $errFName; ?>
												</div>
												<div class="form-group">
													<label for="doctorname">
														Last Name
													</label>
													<input type="text" name="patlname" class="form-control"  value="<?php  echo $row['LastName'];?>" required="true">
													<?php echo $errLName; ?>
												</div>
												<div class="form-group">
													<label for="fess">
														D.O.B.
													</label>
													<input type="Date" name="patdob" class="form-control" value="<?php echo $row['DOB']; ?>" required="true">
													<?php echo $errDOB; ?>
												</div>
												<div class="form-group">
													<label for="fess">
														Contact No.
													</label>
													<input type="text" name="patcontact" class="form-control"  value="<?php  echo $row['TelNo'];?>" required="true" maxlength="10" pattern="[0-9]+">
													<?php echo $errContact; ?>
												</div>
												<div class="form-group">
													<label for="fess">
														Email
													</label>
													<input type="email" id="patemail" name="patemail" class="form-control"  value="<?php  echo $row['Email'];?>" required="true">
													<span id="email-availability-status"></span>
													<?php echo $errEmail; ?>
												</div>
												<div class="form-group">
													<label class="block">
														Title
													</label>
													<div class="clip-radio radio-primary">
														<select id="pattitle" name="pattitle">
															<option value="" <?php if($row['Title'] == '') {echo "selected";} ?>>-- Please select Patient Title --</option>
															<option value="Dr." <?php if($row['Title'] == 'Dr.') {echo "selected";} ?>>Dr.</option>
															<option value="Miss" <?php if($row['Title'] == 'Miss') {echo "selected";} ?>>Miss</option>
															<option value="Mr." <?php if($row['Title'] == 'Mr.') {echo "selected";} ?>>Mr.</option>
															<option value="Mrs." <?php if($row['Title'] == 'Mrs.') {echo "selected";} ?>>Mrs.</option>
															<option value="Ms." <?php if($row['Title'] == 'Ms.') {echo "selected";} ?>>Ms.</option>
															<option value="Pastor" <?php if($row['Title'] == 'Pastor') {echo "selected";} ?>>Pastor</option>
															<option value="Professor" <?php if($row['Title'] == 'Professor') {echo "selected";} ?>>Professor</option>
														</select>
														<?php echo $errTitle; ?>
													</div>
												</div>
												<div class="form-group">
													<label for="address">
														Patient Address
													</label>
													<textarea name="pataddress" class="form-control" required="true"><?php  echo $row['Address'];?></textarea>
													<?php echo $errAddress; ?>
												</div>
												<div class="form-group">
													<label for="fess">
														Creation Date
													</label>
													<input type="text" class="form-control"  value="<?php  echo $row['CreationDate'];?>" readonly='true'>
												</div>
												<?php } ?>
												<button type="submit" name="uppatsubmit" id="submit" class="btn btn-o btn-primary">
													Update
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
