<?php
	//Capture addpatient input 
	if(isset($_POST["regSubmit2"]))
	{
		//start session
		session_start();
		
		//var_dump($_POST);
		
		
		//Keep track of user errors
		$_SESSION['error2'] = 0;
		
		foreach($_POST as $key => $value)
		{
			$_SESSION[$key] = $value;
		}
		
		//validate user input
		if($_SESSION['streetAddress'])
		{
			$_SESSION['errStreetAddress'] = "<span class='auto-width' style='color:green;'>Street Address is <strong>valid</strong></span>";
		}
		else{
			$_SESSION['errStreetAddress'] = "<span class='auto-width' style='color:red;'>Street Address is <strong>invalid</strong></span>";
			$_SESSION['error2']++; //add 1 to the error SESSION
		}
		
		if($_SESSION['District'] == "")
		{
			$_SESSION['errDistrict'] = "<span class='auto-width' style='color:red;'>District is <strong>invalid</strong></span>";
			$_SESSION['error2']++; //add 1 to the error SESSION
		}
		else{
			$_SESSION['errDistrict'] = "<span class='auto-width' style='color:green;'>District is <strong>valid</strong></span>";
		}
		
		if($_SESSION['City'] == "")
		{
			$_SESSION['errCity'] = "<span class='auto-width' style='color:red;'>City is <strong>invalid</strong></span>";
			$_SESSION['error2']++; //add 1 to the error SESSION
		}
		else{
			$_SESSION['errCity'] = "<span class='auto-width' style='color:green;'>City is <strong>valid</strong></span>";
		}
		
		if($_SESSION['Country'] == "")
		{
			$_SESSION['errCountry'] = "<span class='auto-width' style='color:red;'>Country is <strong>invalid</strong></span>";
			$_SESSION['error2']++; //add 1 to the error SESSION
		}
		else
		{
			$_SESSION['errCountry'] = "<span class='auto-width' style='color:green;'>Country is <strong>valid</strong></span>";
		}	
		
		if(filter_var($_SESSION['email'], FILTER_VALIDATE_EMAIL))
		{
			$_SESSION['errEmail'] = "<span class='auto-width' style='color:green;'>Email is <strong>valid</strong></span>";
		}
		else{
			$_SESSION['errEmail'] = "<span class='auto-width' style='color:red;'>Email is <strong>invalid</strong></span>";
			$_SESSION['error2']++; //add 1 to the error SESSION
		}
		
		if(preg_match("/(876)-([\d]{3})-([\d]{4})/", $_SESSION['phoneNumber']))
		{
			$_SESSION['errPhoneNumber'] = "<span class='auto-width' style='color:green;'>Phone Number is <strong>valid</strong></span>";
		}
		else
		{
			$_SESSION['errPhoneNumber'] = "<span class='auto-width' style='color:red;'>Phone Number is <strong>invalid</strong></span>";
			$_SESSION['error2']++; //add 1 to the error SESSION
		}
		
		//var_dump($_SESSION);
		
		//check if err SESSION has a value
		if($_SESSION['error2'] == 0)
		{
			//track patient registration process
			$_SESSION['patientStatus2'] = "complete";
			
			//redirect to register if validate
			header("Location: DisplayInfo.php");
		}
		else
		{
			//redirect back to login page and display error message
			header("Location: addpatient2.php");
		}
		
	}
	
	if(isset($_POST["SaveFile"]))
	{
		//start session
		session_start();
		
		//create file and open it
		$myfile = fopen("patientdata.txt", "a+");
		
		//write patient info to file
		fwrite($myfile, "Title: \t\t".$_SESSION['title']."\n");
		fwrite($myfile, "TRN: \t\t".$_SESSION['trn']."\n");
		fwrite($myfile, "Full Name: \t".$_SESSION['fName']."".$_SESSION['lName']."\n");
		fwrite($myfile, "D.O.B.: \t".$_SESSION['date']."\n");
		fwrite($myfile, "Email: \t\t".$_SESSION['email']."\n");
		fwrite($myfile, "Mobile: \t".$_SESSION['phoneNumber']."\n");
		fwrite($myfile, "Address: \t".$_SESSION['streetAddress'].", ".$_SESSION['District']."\n");
		fwrite($myfile, "City: \t\t".$_SESSION['City']."\n");
		fwrite($myfile, "Country: \t".$_SESSION['Country']."\n");
		fwrite($myfile, "\n");
		
		//Write last access date and time to file
		fwrite($myfile, "Last Accessed: \t".date("F,d,Y H:i:s.",fileatime("patient_information.txt"))."\n");
		fwrite($myfile, "\n");
		
		//close file
		fclose($myfile);
		
		header("Location: ../index.php");
	}
?>