<?php
	session_start();
	
	//check if user is logged in
	if(strlen($_SESSION['loginStatus'])==0)
	{
		header("Location: ../views/doctor/index.php");
	}
	else{
		if(!isset($_SESSION['error1']))
			{
				$_SESSION['errTitle'] = "";
				$_SESSION['errFName'] = "";
				$_SESSION['errLName'] = "";
				$_SESSION['errDate'] = "";
				$_SESSION['errTRN'] = "";
				$_SESSION['fName'] = $_SESSION['lName'] = $_SESSION['title'] = "";
				$_SESSION['trn'] = $_SESSION['date'] = "";
			}
			//echo session_id();
		
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
					<a href="../index.php"><h2  title="Redirect to Welcome Page">AMC | Patient Registration</h2></a>
				</div>
				<div class="box-register">
					<form id="registration" name="registration" method="post" action="addpatient_validate.php">
						<fieldset>
							<legend>Sign Up | Section 1</legend>
							<p>
								Enter your personal details below:
							</p>
							<div class="form-group">
								<label for=""></label>
								<select name="title" required>
									<option value="" selected disabled>Select Title</option>
									<option value="Mr." <?php if($_SESSION['title']=="Mr.") echo "selected"; ?>>Mr.</option>
									<option value="Miss." <?php if($_SESSION['title']=="Miss.") echo "selected"; ?>>Miss.</option>
									<option value="Mrs." <?php if($_SESSION['title']=="Mrs.") echo "selected"; ?>>Mrs.</option>
									<option value="Dr." <?php if($_SESSION['title']=="Dr.") echo "selected"; ?>>Dr.</option>
								</select>
								<?php echo $_SESSION['errTitle']; ?>
							</div>
							<div class="form-group">
								<label for=""></label>
								<input type="text" class="form-control" value="<?php echo $_SESSION['fName'];?>" name="fName" placeholder="First Name" required/>
								<?php echo $_SESSION['errFName']; ?>
							</div>
							<div class="form-group">
								<label for=""></label>
								<input type="text" class="form-control" value="<?php echo $_SESSION['lName'];?>" name="lName" placeholder="Last Name" required/>
								<?php echo $_SESSION['errLName']; ?>
							</div>
							<div class="form-group">
								<label for=""></label>
								<input type="Date" min="1960-01-01" max="2002-12-31" class="form-control" value="<?php echo $_SESSION['date'];?>" name="date" placeholder="D.O.B." required/>
								<?php echo $_SESSION['errDate']; ?>
							</div>
							<div class="form-group">
								<label for=""></label>
								<input type="number" min="100000000" max="999999999" class="form-control" value="<?php echo $_SESSION['trn'];?>" name="trn" placeholder="TRN" required/>
								<?php echo $_SESSION['errTRN']; ?>
							</div>
							<div class="form-actions">
								<button type="submit" class="btn btn-primary pull-right" name="regSubmit1">
									Save & Continue <i class="fa fa-arrow-circle-right"></i>
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