<?php
	session_start();

	if(isset($_SESSION['errflag']))
	{
		foreach($_SESSION as $key => $value)
		{
			$$key = $value;
		}
		session_destroy();
	}
	else{
		//default variable values
		$docname = "";
		$docemail = "";
		$npass = "";
		//default error message
		$docnameerr = $docmaillerr = $pwerr = "";

		session_destroy();
	}
	//error_reporting(0);
	//include('include/config.php');
	//include('include/checklogin.php');
	//check_login();

	/*if(isset($_POST['submit']))
	{	
		$docspecialization=$_POST['Doctorspecialization'];
		$docname=$_POST['docname'];
		$docaddress=$_POST['clinicaddress'];
		$docfees=$_POST['docfees'];
		$doccontactno=$_POST['doccontact'];
		$docemail=$_POST['docemail'];
		$password=md5($_POST['npass']);
		$sql=mysqli_query($con,"insert into doctors(specilization,doctorName,address,docFees,contactno,docEmail,password) values('$docspecialization','$docname','$docaddress','$docfees','$doccontactno','$docemail','$password')");
		if($sql)
		{
			echo "<script>alert('Doctor info added Successfully');</script>";
			echo "<script>window.location.href ='manage-doctors.php'</script>";
		}
	}*/
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Admin | Add Doctor</title>
		
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="views/admin/vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="views/admin/vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="views/admin/vendor/themify-icons/themify-icons.min.css">
		<link href="views/admin/vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="views/admin/vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="views/admin/vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link href="views/admin/vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
		<link href="views/admin/vendor/select2/select2.min.css" rel="stylesheet" media="screen">
		<link href="views/admin/vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
		<link href="views/admin/vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="views/admin/assets/css/styles.css">
		<link rel="stylesheet" href="views/admin/assets/css/plugins.css">
		<link rel="stylesheet" href="views/admin/assets/css/themes/theme-1.css" id="skin_color" />
		<script type="text/javascript">
			function valid()
			{
				if(document.adddoc.npass.value!= document.adddoc.cfpass.value)
				{
					alert("Password and Confirm Password Field do not match  !!");
					document.adddoc.cfpass.focus();
					return false;
				}
				return true;
			}
		</script>
		<script>
			function checkemailAvailability() {
				$("#loaderIcon").show();
				jQuery.ajax({
					url: "check_availability.php",
					data:'emailid='+$("#docemail").val(),
					type: "POST",
					success:function(data){
					$("#email-availability-status").html(data);
					$("#loaderIcon").hide();
					},
					error:function (){}
				});
			}
		</script>
	</head>
	<body>
		<div id="app">
			<div class="app-content">
				<?php include('include/header.php');?>
				<!-- end: TOP NAVBAR -->
				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle">Patient | Make Appointment</h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span>Patient</span>
									</li>
									<li class="active">
										<span>Make Appointment</span>
									</li>
								</ol>
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: BASIC EXAMPLE -->
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-12">
									
									<div class="row margin-top-30">
										<div class="col-lg-8 col-md-12">
											<div class="panel panel-white">
												<div class="panel-heading">
													<h5 class="panel-title">Make Appointment</h5>
												</div>
												<div class="panel-body">
									
													<form role="form" name="adddoc" method="post" action="appointment_validation.php" >
														<div class="form-group">
															<label for="doctorname">
																 First Name
															</label>
															<input type="text" name="fname" class="form-control" value="" placeholder="Enter First Name" required="true">
														</div>
														<div class="form-group">
															<label for="fess">
																 Last Name
															</label>
															<input type="text" id="lname" name="lname" class="form-control"  placeholder="Enter Last Name" required="true" onBlur="checkemailAvailability()">
															<span id="email-availability-status"></span>
														</div>
														<div class="form-group">
															<label for="exampleInputPassword1">
																 Date
															</label>
															<input type="date" name="date" class="form-control"  placeholder="Date" required="required">
														</div>
														<button type="submit" name="addapsubmit" id="submit" class="btn btn-o btn-primary">
															Submit
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
				<!-- end: BASIC EXAMPLE -->
				<!-- end: SELECT BOXES -->
						
			</div>
		</div>
		</div>
		<!-- start: FOOTER -->
		<?php include('views/admin/include/footer.php');?>
			<!-- end: FOOTER -->
		
			<!-- start: SETTINGS -->
		<?php include('views/admin/include/setting.php');?>
			
			<!-- end: SETTINGS -->
		</div>
		<!-- start: MAIN JAVASCRIPTS -->
		<script src="views/admin/vendor/jquery/jquery.min.js"></script>
		<script src="views/admin/vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="views/admin/vendor/modernizr/modernizr.js"></script>
		<script src="views/admin/vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="views/admin/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="views/admin/vendor/switchery/switchery.min.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="views/admin/vendor/maskedinput/jquery.maskedinput.min.js"></script>
		<script src="views/admin/vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
		<script src="views/admin/vendor/autosize/autosize.min.js"></script>
		<script src="views/admin/vendor/selectFx/classie.js"></script>
		<script src="views/admin/vendor/selectFx/selectFx.js"></script>
		<script src="views/admin/vendor/select2/select2.min.js"></script>
		<script src="views/admin/vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		<script src="views/admin/vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="views/admin/assets/js/main.js"></script>
		<!-- start: JavaScript Event Handlers for this page -->
		<script src="views/admin/assets/js/form-elements.js"></script>
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