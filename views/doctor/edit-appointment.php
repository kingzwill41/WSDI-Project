<?php
	session_start();
	error_reporting(0);
	include('include/config.php');
	include('include/checklogin.php');
	check_login();
	
	if(isset($_GET['cancel']))
	{
		$query = "UPDATE appointment SET `Status`='Cancelled' WHERE TRN ='".$_GET['id']."'";
		mysqli_query($conn,$query);
        $_SESSION['msg']="Appointment Cancelled !!";
	}

	if(isset($_GET['active']))
	{
		$query = "UPDATE appointment SET `Status`='Active' WHERE TRN ='".$_GET['id']."'";
		mysqli_query($conn,$query);
        $_SESSION['msg']="Appointment Activated !!";
	}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
		<title>Doctor | Edit Appointment</title>
		
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
				<!-- end: TOP NAVBAR -->
				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle">Doctor  | Edit Appointment</h1>
								</div>
								<ol class="breadcrumb">
									<li>
										<span>Doctor </span>
									</li>
									<li class="active">
										<span>Edit Appointment</span>
									</li>
								</ol>
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: BASIC EXAMPLE -->
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-12">
									<p style="color:red;"><?php echo htmlentities($_SESSION['msg']);?>
										<?php echo htmlentities($_SESSION['msg']="");?>
									</p>	
									<table class="table table-hover" id="sample-table-1">
										<thead>
											<tr>
												<th class="center">#</th>
												<th class="hidden-xs">Patient Name</th>
												<th>Appointment Date / Time </th>
                                                <th>ReasonForVisit</th>
												<th>Current Status</th>
												<th>Action</th>
												
											</tr>
										</thead>
										<tbody>
										<?php
                                            $trn = $_GET['id'];

                                            echo "TRN: ".$trn;

                                            $selQuery = "SELECT
                                                            patient.FirstName as fname,
                                                            patient.LastName as lname,
                                                            appointment.*
                                                         FROM
                                                            appointment 
                                                         JOIN patient on 
                                                            patient.StaffID = appointment.StaffID
                                                         WHERE appointment.TRN = '$trn'";

                                             
											$sql=mysqli_query($conn,$selQuery);
											
											$cnt=1;
											
											while($row=mysqli_fetch_assoc($sql))
											{
										?>

											<tr>
												<td class="center"><?php echo $cnt;?>.</td>
												<td class="hidden-xs"><?php echo $row['fname']." ".$row['lname'];?></td>
												<td><?php echo $row['Date'];?> / <?php echo $row['Time']?></td>
												<td><?php echo $row['ReasonForVisit'];?></td>
                                                <td><?php echo $row['Status'];?></td>
												<td >
													<div class="visible-md visible-lg hidden-sm hidden-xs">
													<a href="appointment-details.php?id=<?php echo $row['TRN'];?>" class="btn btn-transparent btn-lg" title="View Details"><i class="fa fa-file"></i></a> |
														<?php
															if(($row['Status'])=="Cancelled")
															{
																echo "Cancelled";
															}
															else{
														?>
														<?php 
															if(($row['Status'])=="Pending" )  
															{ 
														?>
														<a href="edit-appointment.php?id=<?php echo $row['TRN']?>&active=update" onClick="return confirm('Are you sure you want to switch this appointment to active?')"class="btn btn-transparent btn-xs tooltips" title="Activate Appointment" tooltip-placement="top" tooltip="Add">Activate</a>
														<?php } else {

															echo "Active";
															} ?>
														<?php 
															if(($row['Status'])=="Pending" || ($row['Status'])=="Active")  
															{ 
														?>
														|<a href="edit-appointment.php?id=<?php echo $row['TRN']?>&cancel=update" onClick="return confirm('Are you sure you want to cancel this appointment ?')"class="btn btn-transparent btn-xs tooltips" title="Cancel Appointment" tooltip-placement="top" tooltip="Remove">Cancel</a>
														<?php 
															} else {

															echo "Cancelled";
															} 
															}
														?>
													</div>
												</td>
											</tr>
											
											<?php 
												$cnt=$cnt+1;
											 }?>

										</tbody>
									</table>
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
        </div>
    </body>

</html>