<?php
	session_start();

	//$_SESSION['idk'] = $did=intval($_GET['id']);// get doctor id
	error_reporting(0);
	include('include/config.php');
	include('include/checklogin.php');
	
	if(isset($_POST['submit']))
	{
		$docname=$_POST['nursename'];
		$password=$_POST['npass'];
		$docemail=$_POST['nurseemail'];
		$id = $_SESSION['id'];

		if(preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}$/",$password))
		{
			$query = "UPDATE `staff` SET `Name`='$docname',`Email`='$docemail',`Password`='$password' WHERE StaffID='$id'";
			$sql=mysqli_query($conn,$query);
			if($sql)
			{
				echo "<script>alert('Nurse Details updated Successfully');</script>";
				header("location: dashboard.php");
			}
		}else{
				echo "<script>alert('Nurse Details updated Unsuccessfully');</script>";
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Nurse | Edit Nurse Details</title>
		
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
									<h1 class="mainTitle">Nurse | Edit Nurse Details</h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span>Nurse</span>
									</li>
									<li class="active">
										<span>Edit Nurse Details</span>
									</li>
								</ol>
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: BASIC EXAMPLE -->
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-12">
									<h5 style="color: green; font-size:18px; ">
										<?php if($_SESSION['msg']) { echo htmlentities($_SESSION['msg']);}?> 
									</h5>
									<div class="row margin-top-30">
										<div class="col-lg-8 col-md-12">
											<div class="panel panel-white">
												<div class="panel-heading">
													<h5 class="panel-title">Edit Nurse</h5>
												</div>
												<div class="panel-body">
													<?php
														//create connection
														include('include/config.php');

														//write query string
														$selQuery = "SELECT * FROM `staff` WHERE `type`='Nurse' AND `Email` = '".$_SESSION['username']."'";
														
														//run query
														$results = mysqli_query($conn,$selQuery) or die("Could not find database record(s)".mysqli_error($conn));
														while($data=mysqli_fetch_assoc($results))
														{
													?>
													<h4><?php echo htmlentities($data['Name']);?>'s Profile</h4>
													<hr />
													<form role="form" name="adddoc" method="post" onSubmit="return valid();">
														<div class="form-group">
															<label for="nursename">
																 Nurse Name
															</label>
															<input type="text" name="nursename" class="form-control" value="<?php echo htmlentities($data['Name']);?>" >
														</div>
														<div class="form-group">
															<label for="nurseemail">
															Nurse Email
															</label>
															<input type="email" name="nurseemail" class="form-control"  readonly="readonly"  value="<?php echo htmlentities($data['Email']);?>">
														</div>
														<div class="form-group">
															<label for="npass">
																 Nurse Password
															</label>
															<input type="password" name="npass" class="form-control" required="required"  value="<?php echo htmlentities($data['Password']);?>">
														</div>
														<?php } ?>

														<button type="submit" name="submit" class="btn btn-o btn-primary">
															Update
														</button>
													</form>

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
	<?php include('include/footer.php');?>
			<!-- end: FOOTER -->
		
			<!-- start: SETTINGS -->
	<?php include('include/setting.php');?>
			<>
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
