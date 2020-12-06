<?php
	include_once('views/include/config.php');
	if(isset($_POST['submit']))
	{
		$name=$_POST['fullname'];
		$email=$_POST['emailid'];
		$mobileno=$_POST['mobileno'];
		$dscrption=$_POST['description'];
		$query=mysqli_query($conn,"INSERT into contactus (fullname,email,contactno,message) value('$name','$email','$mobileno','$dscrption')");

		echo "<script>alert('Your information succesfully submitted');</script>";
		echo "<script>window.location.href ='contact.php'</script>";

	}
?>
<!doctype html>
<html lang="en">

<head>
	<title>AMC | Contact us</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="css/style1.css" rel="stylesheet" type="text/css" media="all" />
	<link href='http://fonts.googleapis.com/css?family=Ropa+Sans' rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css2?family=Mulish:wght@400;700;900&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="fonts/icomoon/style.css">

	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/jquery-ui.css">
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<link rel="stylesheet" href="css/jquery.fancybox.min.css">
	<link rel="stylesheet" href="css/bootstrap-datepicker.css">
	<link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
	<link rel="stylesheet" href="fonts/flaticon-covid/font/flaticon.css">
	<link rel="stylesheet" href="css/aos.css">
	<link rel="stylesheet" href="css/style3.css">

</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">


	<div id="overlayer"></div>
	<div class="loader">
		<div class="spinner-border text-primary" role="status">
			<span class="sr-only">Loading...</span>
		</div>
	</div>


	<div class="site-wrap">

		<div class="site-mobile-menu site-navbar-target">
			<div class="site-mobile-menu-header">
				<div class="site-mobile-menu-close mt-3">
					<span class="icon-close2 js-menu-toggle"></span>
				</div>
			</div>
			<div class="site-mobile-menu-body"></div>
		</div>
		<header class="site-navbar light js-sticky-header site-navbar-target" role="banner">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-6 col-xl-2">
						<div class="mb-0 site-logo"><a href="index.php" class="mb-0">Avocado Medical Centre<span
									class="text-primary">.</span> </a></div>
					</div>
					<div class="col-12 col-md-10 d-none d-xl-block">
						<nav class="site-navigation position-relative text-right" role="navigation">
							<ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
								<li><a href="index.php" class="nav-link">Home</a></li>
								<li><a href="index.php" class="nav-link">Make Appointment</a></li>
								<li><a href="contact.php" class="nav-link">Contact Us</a></li>
								<li><a href="login.php" class="nav-link">Login</a></li>

							</ul>
						</nav>
					</div>
					<div class="col-6 d-inline-block d-xl-none ml-md-0 py-3" style="position: relative; top: 3px;"><a
							href="#" class="site-menu-toggle js-menu-toggle float-right"><span
								class="icon-menu h3 text-black"></span></a>
					</div>
				</div>
			</div>
		</header>

		<div class="site-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<div class="company_address">
							<h2>Hospital Address :</h2>
							<p>67 Old Hope Road,</p>
							<p>Kingston 6, Kingston</p>
							<p>Jamaica</p>
							<p>Phone:(876) 567 3820</p>
							<p>Fax: (876) 567 3820 1</p>
							<p>Email: <span>info@mycompany.com</span></p>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="contact-form">
							<h2>Contact Us</h2>
							<form name="contactus" method="post">
								<div>
									<span><label>NAME</label></span>
									<span><input type="text" name="fullname" required="true" value=""></span>
								</div>
								<div>
									<span><label>E-MAIL</label></span>
									<span><input type="email" name="emailid" required="ture" value=""></span>
								</div>
								<div>
									<span><label>MOBILE.NO</label></span>
									<span><input type="text" name="mobileno" required="true" value=""></span>
								</div>
								<div>
									<span><label>Description</label></span>
									<span><textarea name="description" required="true"> </textarea></span>
								</div>
								<div>
									<span><input type="submit" name="submit" value="Submit"></span>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script src="js/jquery-3.3.1.min.js"></script>
		<script src="js/jquery-ui.js"></script>
		<script src="js/popper.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/owl.carousel.min.js"></script>
		<script src="js/jquery.countdown.min.js"></script>
		<script src="js/jquery.easing.1.3.js"></script>
		<script src="js/aos.js"></script>
		<script src="js/jquery.fancybox.min.js"></script>
		<script src="js/jquery.sticky.js"></script>
		<script src="js/isotope.pkgd.min.js"></script>
		<script src="js/main.js"></script>
		<script src="https://widget.yazio.com/calculator.js" async></script>
</body>


</html>