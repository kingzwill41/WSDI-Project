<?php
	session_start();
	
	if(strlen($_SESSION['loginStatus'])==0)
	{
		header("Location: ../views/doctor/index.php");
	}
	else{
		//check if user completed section 2 of patient registration
		if(strlen($_SESSION['patientStatus2'])==0)
		{
			header("Location: addpatient2.php");
		}
		
	}
	
	//var_dump($_SESSION);
	//var_dump($_POST);
?>

<!DOCHTML>

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
		<link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
		<link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
	</head>
	<body>
		<div class="clear"></div>
		
		<h1 class="Jumbotron" align="center">Personal Information</h1>
		<div class="container">
			<div class="container-fluid">
				<table class="table" align="center">
					<tbody>
						<tr>
							<?php
								echo "<th>Full Name</th>";
								echo "<td>".$_SESSION['fName']." ".$_SESSION['lName']."</td>";
							?>
						</tr>
						<tr>
							<?php
								echo "<th>D.O.B.</th>";
								echo "<td>".$_SESSION['date']."</td>";
							?>
						</tr>
						<tr>
							<?php
								echo "<th>TRN</th>";
								echo "<td>".$_SESSION['trn']."</td>";
							?>
						</tr>
						<tr>
							<?php
								echo "<th>Email</th>";
								echo "<td>".$_SESSION['email']."</td>";
							?>
						</tr>
						<tr>
							<?php
								echo "<th>Mobile</th>";
								echo "<td>".$_SESSION['phoneNumber']."</td>";
							?>
						</tr>
						<tr>
							<?php
								echo "<th>Address</th>";
								echo "<td>".$_SESSION['streetAddress'].", ".$_SESSION['District']."</td>";
							?>
						</tr>
						<tr>
							<?php
								echo "<th>City</th>";
								echo "<td>".$_SESSION['City']."</td>";
							?>
						</tr>
						<tr>
							<?php
								echo "<th style='color: red;'>Country</th>";
								echo "<td>".$_SESSION['Country']."</td>";
							?>
						</tr>
					</tbody>
					<tfooter>
						<form method="post" action="addpatient2_validate.php">
							<tr>
								<td align="center"><button title="Click to Save Record" name="SaveFile" type="submit" class="btn btn-primary">Save to File</button></td>
							</tr>
						</form>
					</tfooter>
				</table>
			</div>
		</div>
	</body>

</html>

<style type="text/css" rel="stylesheet">
	table{
		border: 1px solid #3391E7;
		padding: 15px;
		width: 25%;
	}
	
	th,td{
		text-align: left;
		padding: 8px;
	}
	
	tr:nth-child(even){background-color: #90C4EE}
	
	
</style>