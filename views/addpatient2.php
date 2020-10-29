<?php
	session_start();
	
	if(strlen($_SESSION['loginStatus'])==0)
	{
		header("Location: ../views/doctor/index.php");
	}
	else{
		//check if user completed section 1 of patient registration
		if(strlen($_SESSION['patientStatus1'])==0)
		{
			header("Location: addpatient.php");
		}
		else{
			if(!isset($_SESSION['error2']))
			{
				$_SESSION['errEmail'] = "";
				$_SESSION['errPhoneNumber'] = "";
				$_SESSION['errStreetAddress'] = "";
				$_SESSION['errDistrict'] = "";
				$_SESSION['errCity'] = "";
				$_SESSION['errCountry'] = "";
				$_SESSION['email'] = "";
				$_SESSION['phoneNumber'] = "";
				$_SESSION['streetAddress'] = "";
				$_SESSION['District'] = "";
				$_SESSION['City'] = "";
				$_SESSION['Country'] = "";
			}	
			//echo session_id();
		}
		
	}
	
	//var_dump($_SESSION);
?>

<!DOCHTML html>
<html>
	<head>
		<title>User Registration</title>
		<link href="../images/logo.png" rel="icon" type="images/png" />
		
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
		<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
		
	</head>
	<body class="login">
		<div class="row">
			<div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
				<div class="logo margin-top-30">
					<a href="../index.php"><h2 title="Redirect to Welcome Page">AMC | Patient Registration</h2></a>
				</div>
				<div class="box-register">
					<form id="registration" name="registration" method="post" action="addpatient2_validate.php">
						<fieldset>
							<legend>Sign Up | Section 2</legend>
							<p>
								Enter your Contact details below:
							</p>
							<div class="row">
								<div class="col-md-6">
									<label for="streetAddress"><i class="fa fa-road"></i> Street Address</label>
									<input type="text" class="form-control" value="<?php echo $_SESSION['streetAddress']; ?>" id="streetAddress" name="streetAddress" placeholder="Street Address" required/>
									<?php echo $_SESSION['errStreetAddress']; ?>
								</div>
								<div class="col-md-6">
									<label for="District"><i class="fa fa-map-marker"></i> District</label>
									<input type="text" class="form-control" value="<?php echo $_SESSION['District']; ?>" id="District" name="District" placeholder="District" required/>
									<?php echo $_SESSION['errDistrict']; ?>
								</div>
							</div>
							<br />
							<div class="row">
								<div class="col-md-6">
									<label for="City"><i class="fa fa-map-marker"></i> City</label>
									<br />
									<select id="City" name="City" required>
										<option value="" selected disabled> Select Parish</option>
										<option value="Clarendon" <?php if($_SESSION['City']=="Clarendon") echo "selected"; ?>>Clarendon</option>
										<option value="Hanover" <?php if($_SESSION['City']=="Hanover") echo "selected"; ?>>Hanover</option>
										<option value="Kingston" <?php if($_SESSION['City']=="Kingston") echo "selected"; ?>>Kingston</option>
										<option value="Manchester" <?php if($_SESSION['City']=="Manchester") echo "selected"; ?>>Manchester</option>
										<option value="Portland" <?php if($_SESSION['City']=="Portland") echo "selected"; ?>>Portland</option>
										<option value="St. Andrew" <?php if($_SESSION['City']=="St. Andrew") echo "selected"; ?>>St. Andrew</option>
										<option value="St. Ann" <?php if($_SESSION['City']=="St. Ann.") echo "selected"; ?>>St. Ann</option>
										<option value="St. Elizabeth" <?php if($_SESSION['City']=="St. Elizabeth") echo "selected"; ?>>St. Elizabeth</option>
										<option value="St. James" <?php if($_SESSION['City']=="St. James") echo "selected"; ?>>St. James</option>
										<option value="St. Mary" <?php if($_SESSION['City']=="St. Mary") echo "selected"; ?>>St. Mary</option>
										<option value="St. Thomas" <?php if($_SESSION['City']=="St. Thomas") echo "selected"; ?>>St. Thomas</option>
										<option value="Trelawney" <?php if($_SESSION['City']=="Trelawney") echo "selected"; ?>>Trelawney</option>
										<option value="Westmoreland" <?php if($_SESSION['City']=="Westmoreland") echo "selected"; ?>>Westmoreland</option>
										<option value="St. Catherine" <?php if($_SESSION['City']=="St. Catherine") echo "selected"; ?>>St. Catherine</option>
									</select>
									<?php echo $_SESSION['errCity']; ?>
								</div>
								<div class="col-md-6">
									<label for="Country"><i class="fa fa-globe"></i> Country</label>
									<input type="text" class="form-control" value="<?php echo $_SESSION['Country']; ?>" id="Country" name="Country" placeholder="Country" required/>
									<?php echo $_SESSION['errCountry']; ?>
								</div>
							</div>
							<br />
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="email"><i class="fa fa-envelope"></i> E-mail Address</label>
										<input type="email" title="format: jdoe@gmail.com" class="form-control" value="<?php echo $_SESSION['email']; ?>" id="email" name="email" placeholder="Email" required/>
										<?php echo $_SESSION['errEmail']; ?>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="phoneNumber"><i class="fa fa-phone"></i> Cell No.</label>
										<input type="text" title="format: xxx-xxx-xxx" class="form-control" value="<?php echo $_SESSION['phoneNumber']; ?>" id="phoneNumber" name="phoneNumber" placeholder="Cell No." required/>
										<?php echo $_SESSION['errPhoneNumber']; ?>
									</div>
								</div>
							</div>
							
							<div class="form-actions">
								<button type="submit" class="btn btn-primary pull-right" name="regSubmit2">
									Save & Submit <i class="fa fa-arrow-circle-right"></i>
								</button>
							</div>
						</fieldset>
					</form>
					
					<div class="copyright">
						<?php
							include('../footer.php');
						?>
					</div>
					
				</div>
			</div>
		</div>
		
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<script src="vendor/jquery-validation/jquery.validate.min.js"></script>
	
		<script src="assets/js/main.js"></script>

		<script src="assets/js/login.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				Login.init();
			});
		</script>
		
	</body>
</html>