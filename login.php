<?php
  // Set session variables
  session_start();
  if(!isset($_SESSION["emailErr"]) && !isset($_SESSION["loginTypeErr"]) && !isset($_SESSION["passwordErr"])){
	$_SESSION["email"] = " ";
	$_SESSION["loginType"] = " ";
	$_SESSION["password"] = " ";
	$_SESSION["emailErr"] = " ";
	$_SESSION["loginTypeErr"] = " ";
	$_SESSION["passwordErr"] = " ";
	}
  ?>
<!doctype html>
<html lang="en">

<head>
  <title>AMC</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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
          <div class="col-6 d-inline-block d-xl-none ml-md-0 py-3" style="position: relative; top: 3px;"><a href="#"
              class="site-menu-toggle js-menu-toggle float-right"><span class="icon-menu h3 text-black"></span></a>
          </div>
        </div>
      </div>
    </header>

  <div class="site-wrap">
    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
    <div class="site-section" >
      <div class="container"  style="padding:200px 0px 0px 0px;">
        <div class="container" style="margin-left: 46%;">
          <span class="text-primary" style="font-size: 250%;">Login</span>
        </div>
        <form method="POST" action="login_val.php">
          <div class="row">
            <div class="col-lg-6 container">
              <div class="form-group">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" class="form-control">
				<span class="error" style="color:red;"><?php echo $_SESSION["emailErr"];?> </span>
              </div>
            </div>
          </div>
		  <div class="row">
            <div class="col-lg-6 container">
              <div class="form-group">
			  	<label for="cars">Who are you trying to login as:</label>
					<select name="loginType" id="loginType">
						<option value="admin">Admin</option>
						<option value="doctor">Doctor</option>
						<option value="nurse">Nurse</option>
					</select>
					<span class="error" style="color:red;"><?php echo "".$_SESSION["loginTypeErr"];?> </span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6 container">
              <div class="form-group">
                <label for="password">Password</label>
                <input type="text" id="password" name="password" class="form-control">
				<span class="error" style="color:red;"><?php echo $_SESSION["passwordErr"];?> </span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6 container" style="margin-left: 42%;">
              <input type="submit" class="btn btn-primary" value="Login">
            </div>
          </div>
        </form>
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
</body>
</html>












