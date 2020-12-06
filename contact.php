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
<!DOCTYPE HTML>
<html>
	<head>
		<title>AMC | Contact us</title>
		<link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
		<link href="css/style1.css" rel="stylesheet" type="text/css"  media="all" />
		<link href='http://fonts.googleapis.com/css?family=Ropa+Sans' rel='stylesheet' type='text/css'>
	</head>
	<body>
		<!--start-wrap-->
		
			<!--start-header-->
			<header>
				<nav class="wrap ">
					<a class="logo" href="index.php">
						<img src="images/logo.png" title="Avocado Logo" width="100px" height="100px" />
						<h1 style="float: right; text-size: 40px;">Avocado Medical Centre</h1>
					</a>
							
					<div class="top-nav" >
								
						<ul>
							<li>
								<a href="index.php" >Home</a>
							</li>
							<li>
								<a href="book-appointment.php">Book Appointment</a>
							</li>
							<li>
								<a href="aboutus.php" >About Us</a>
							<li>
							<li class="active">
								<a href="contact.php" >Contact Us</a>
							<li>
						</ul>
					</div>
					
				</nav>
				<div class="clear"></div>
			</header>
		    <div class="clear"> </div>
		    <div class="wrap">
		   		<div class="contact">
		   			<div class="section group">				
						<div class="col span_1_of_3">
					
      					<div class="company_address">
				     		<h2>Hospital Address  :</h2>
						    <p>67 Old Hope Road,</p>
						   	<p>Kingston 6, Kingston</p>
						   	<p>Jamaica</p>
				   			<p>Phone:(876) 567 3820</p>
				   			<p>Fax: (876) 567 3820 1</p>
				 	 		<p>Email: <span>info@mycompany.com</span></p>
				   	
				  		</div>
					</div>				
					<div class="col span_2_of_3">
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
			  	<div class="clear"> </div>
			</div>
			<div class="clear"> </div>
		</div>
	    <div class="clear"> </div>
		<?php 
			include("footer.php");
		?>
		<!--end-wrap-->
	</body>
</html>

