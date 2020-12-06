<?php
	//start session
	session_start();

	$_SESSION['errflag'] = 0;

	//Capture Login User input 
	if(isset($_POST["loginSubmit"]))
	{
		foreach($_POST as $key => $value )
		{
			$$key = $value;
		}

		//validate username and password
		//if(isset($username))
		if(filter_var($username, FILTER_VALIDATE_EMAIL))
		{
			$_SESSION['errUser'] = "<span class='auto-width' style='color: green;'>Email is <strong>valid</strong></span>";
		}
		else{
			$_SESSION['errUser'] = "<span class='auto-width' style='color: red;'>Email is <strong>invalid</strong></span>";
			$_SESSION['errflag']++; //add 1 to the err SESSION
		}
		
		if(preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}$/",$password))
		{
			$_SESSION['errPassword'] = "<span class='auto-width' style='color:green;'>Password is <strong>valid</strong></span>";
		}
		else{
			$_SESSION['errPassword'] = "<span class='auto-width' style='color:red;'>Password is <strong>invalid</strong></span>";
			$_SESSION['errflag']++; //add 1 to the err SESSION
		}

		//check if err SESSION has a value
		if($_SESSION['errflag'] == 0)
		{
			 //connect to database
			 include("include/config.php");
			 
			//write select query
			$query = "SELECT * FROM staff WHERE Type='Doctor' && Email='$username' && password='$password'";
            $result = mysqli_query($conn, $query);
			
			$num = mysqli_num_rows($result);
			if($num== 1)
            {
				$_SESSION['lgerr'] = "<p style='color: green; font-weight:bold'>Username and Password match found.</p>";
				$_SESSION['username'] = $username;

				$row = mysqli_fetch_assoc($result);

				$_SESSION['id'] = $row['StaffID'];

                //redirect to doc dashboard
                header("Location: dashboard.php");
                exit();
            }
            else{
                $_SESSION['lgerr'] = "<p style='color: red; font-weight:bold'>Username and Password not found.</p>";
				//redirect back to doc Login page and display error messages
                header("Location: index.php");
                exit();
            }
		}
		else
		{
			$_SESSION['lgerr'] = "<p style='color: red; font-weight:bold'>Username and Password not found.</p>";
			//redirect back to doc Login page and display error messages
			header("Location: index.php");
			exit();
		}
		
	}

	if(isset($_POST['addpatsubmit']))
    {
		foreach($_POST as $key => $value )
		{
			$$key = $value;
		}

		//validate patient information
		if($patfname == "")
		{
			$_SESSION['errFName'] = "<span class='auto-width' style='color: red;'>First Name is <strong>invalid</strong></span>";
			$_SESSION['errflag']++;
		}else
		{
			//$_SESSION['errFName'] = "<span class='auto-width' style='color: green;'>First Name is <strong>valid</strong></span>";
		}

		if($patlname == "")
		{
			$_SESSION['errLName'] = "<span class='auto-width' style='color: red;'>Last Name is <strong>invalid</strong></span>";
			$_SESSION['errflag']++;
		}else{
			//$_SESSION['errLName'] = "<span class='auto-width' style='color: green;'>Last Name is <strong>valid</strong></span>";
		}

		if($patcontact == "")
		{
			$_SESSION['errContact'] = "<span class='auto-width' style='color: red;'>Patient Contact Number is <strong>invalid</strong></span>";
			$_SESSION['errflag']++;
		}
		else{
			//$_SESSION['errContact'] = "<span class='auto-width' style='color: green;'>Patient Contact Number is <strong>valid</strong></span>";
		}

		if(filter_var($patemail, FILTER_VALIDATE_EMAIL))
		{
			//$_SESSION['errEmail'] = "<span class='auto-width' style='color: green;'>Patient Email is <strong>valid</strong></span>";
		}
		else{
			$_SESSION['errEmail'] = "<span class='auto-width' style='color: red;'>Patient Email is <strong>invalid</strong></span>";
			$_SESSION['errflag']++;
		}

		if($pattitle == "")
		{
			$_SESSION['errTitle'] = "<span class='auto-width' style='color: red;'>Patient Title is <strong>invalid</strong></span>";
			$_SESSION['errflag']++;
		}
		else{
			//$_SESSION['errTitle'] = "<span class='auto-width' style='color: green;'>Patient Title is <strong>valid</strong></span>";
		}

		if(strlen($pattrn)!= 9)
		{
			$_SESSION['errTRN'] = "<span class='auto-width' style='color: red;'>Patient TRN is <strong>invalid</strong></span>";
			$_SESSION['errflag']++;
		}
		else{
			//$_SESSION['errTRN'] = "<span class='auto-width' style='color: green;'>Patient TRN is <strong>valid</strong></span>";
		}

		if($pataddress == "")
		{
			$_SESSION['errAddress'] = "<span class='auto-width' style='color: red;'>Patient Address is <strong>invalid</strong></span>";
			$_SESSION['errflag']++;
		}
		else{
			//$_SESSION['errAddress'] = "<span class='auto-width' style='color: green;'>Patient Address is <strong>valid</strong></span>";
		}

		if($patdob == "")
		{
			$_SESSION['errDOB'] = "<span class='auto-width' style='color: red;'>Patient D.O.B. is <strong>invalid</strong></span>";
			$_SESSION['errflag']++;
		}
		else{
			//$_SESSION['errDOB'] = "<span class='auto-width' style='color: green;'>Patient D.O.B. is <strong>valid</strong></span>";
		}
		
		if($_SESSION['errflag'] == 0)
		{
			//connect to database
			include("include/config.php");

			$StaffID = $_SESSION['id'];
			echo $StaffID;
			//write select query
			$query = "INSERT INTO `patient`(`TRN`, `StaffID`, `Title`, `FirstName`, `LastName`, `DOB`, `Address`, `TelNo`, `Email`) 
					  VALUES ('$pattrn','$StaffID','$pattitle','$patfname','$patlname','$patdob','$pataddress','$patcontact','$patemail')";

			mysqli_query($conn, $query) or die("Could not insert user information.".mysqli_error($conn));
			
			//close connection
			mysqli_close($conn);
			
			header("Location: add-patient.php?check=added");
		}
		else{
			//redirect back to add-patient.php page and display error messages
            header("Location: add-patient.php");
		}
	}

	if(isset($_POST['uppatsubmit']))
    {
		foreach($_POST as $key => $value )
		{
			$$key = $value;
		}

		//validate patient information
		if($patfname == "")
		{
			$_SESSION['errFName'] = "<span class='auto-width' style='color: red;'>First Name is <strong>invalid</strong></span>";
			$_SESSION['errflag']++;
		}else
		{
			//$_SESSION['errFName'] = "<span class='auto-width' style='color: green;'>First Name is <strong>valid</strong></span>";
		}

		if($patlname == "")
		{
			$_SESSION['errLName'] = "<span class='auto-width' style='color: red;'>Last Name is <strong>invalid</strong></span>";
			$_SESSION['errflag']++;
		}else{
			//$_SESSION['errLName'] = "<span class='auto-width' style='color: green;'>Last Name is <strong>valid</strong></span>";
		}

		if($patcontact == "")
		{
			$_SESSION['errContact'] = "<span class='auto-width' style='color: red;'>Patient Contact Number is <strong>invalid</strong></span>";
			$_SESSION['errflag']++;
		}
		else{
			//$_SESSION['errContact'] = "<span class='auto-width' style='color: green;'>Patient Contact Number is <strong>valid</strong></span>";
		}

		if(filter_var($patemail, FILTER_VALIDATE_EMAIL))
		{
			//$_SESSION['errEmail'] = "<span class='auto-width' style='color: green;'>Patient Email is <strong>valid</strong></span>";
		}
		else{
			$_SESSION['errEmail'] = "<span class='auto-width' style='color: red;'>Patient Email is <strong>invalid</strong></span>";
			$_SESSION['errflag']++;
		}

		if($pattitle == "")
		{
			$_SESSION['errTitle'] = "<span class='auto-width' style='color: red;'>Patient Title is <strong>invalid</strong></span>";
			$_SESSION['errflag']++;
		}
		else{
			//$_SESSION['errTitle'] = "<span class='auto-width' style='color: green;'>Patient Title is <strong>valid</strong></span>";
		}

		if($pataddress == "")
		{
			$_SESSION['errAddress'] = "<span class='auto-width' style='color: red;'>Patient Address is <strong>invalid</strong></span>";
			$_SESSION['errflag']++;
		}
		else{
			//$_SESSION['errAddress'] = "<span class='auto-width' style='color: green;'>Patient Address is <strong>valid</strong></span>";
		}

		if($patdob == "")
		{
			$_SESSION['errDOB'] = "<span class='auto-width' style='color: red;'>Patient D.O.B. is <strong>invalid</strong></span>";
			$_SESSION['errflag']++;
		}
		else{
			//$_SESSION['errDOB'] = "<span class='auto-width' style='color: green;'>Patient D.O.B. is <strong>valid</strong></span>";
		}
		
		if($_SESSION['errflag'] == 0)
		{
			//connect to database
			include("include/config.php");

			$TRN = $_SESSION['TRN'];

			//write select query
			$query = "UPDATE `patient` SET `Title` = '$pattitle', `FirstName` = '$patfname', `LastName` = '$patlname', 
					  `DOB` = '$patdob', `Address` = '$pataddress', `TelNo` = '$patcontact', `Email` = '$patemail' 
					  WHERE `TRN` = '$TRN'";

			mysqli_query($conn, $query) or die("Could not insert user information.".mysqli_error($conn));
			
			//close connection
			mysqli_close($conn);
			
			header("Location: edit-patient.php?updated=yes");
		}
		else{
			//redirect back to add-patient.php page and display error messages
            header("Location: add-patient.php");
		}
	}

	if(isset($_POST['addmedsubmit']))
	{
		foreach($_POST as $key => $value )
		{
			$$key = $value;
		}

		include("include/config.php");

		$trn = $_SESSION['idk'];

		$query = "INSERT INTO `medicalhistory`(`TRN`, `BloodPressure`, `BloodSugar`, `Weight`, `Temperature`, `MedicalPres`) 
				  VALUES('$trn','$bp','$bs','$weight','$temp','$pres')";
		
		$result = mysqli_query($conn,$query);

		//close connection
		mysqli_close($conn);

		header("Location: view-patient.php?check=added");

	}
?>