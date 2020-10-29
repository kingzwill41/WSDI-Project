<?php
	//Capture addpatient input 
	if(isset($_POST["regSubmit1"]))
	{
		//start session
		session_start();
		
		//var_dump($_POST);
		var_dump($_SESSION);
		
		//Keep track of user errors
		$_SESSION['error1'] = 0;
		
		foreach($_POST as $key => $value)
		{
			$_SESSION[$key] = $value;
		}
		
		//validate user input
		if($_SESSION['title'] == "")
		{
			$_SESSION['errTitle'] = "<span class='auto-width' style='color:red;'>Title is <strong>invalid</strong></span>";
			$_SESSION['error1']++; //add 1 to the err SESSION
		}
		else{
			$_SESSION['errTitle'] = "<span class='auto-width' style='color:green;'>Title is <strong>valid</strong></span>";
		}
		
		if($_SESSION['fName'] == "")
		{
			$_SESSION['errFName'] = "<span class='auto-width' style='color:red;'>First Name is <strong>invalid</strong></span>";
			$_SESSION['error1']++; //add 1 to the err SESSION
		}
		else{
			$_SESSION['errFName'] = "<span class='auto-width' style='color:green;'>First Name is <strong>valid</strong></span>";
		}
		
		if($_SESSION['lName'] == "")
		{
			$_SESSION['errLName'] = "<span class='auto-width' style='color:red;'>Last Name is <strong>invalid</strong></span>";
			$_SESSION['error1']++; //add 1 to the err SESSION
		}
		else{
			$_SESSION['errLName'] = "<span class='auto-width' style='color:green;'>Last Name is <strong>valid</strong></span>";
		}
		
		if($_SESSION['date'] == "")
		{
			$_SESSION['errDate'] = "<span class='auto-width' style='color:red;'>Date is <strong>invalid</strong></span>";
			$_SESSION['error1']++; //add 1 to the err SESSION
		}
		else{
			$_SESSION['errDate'] = "<span class='auto-width' style='color:green;'>Date is <strong>valid</strong></span>";
		}
		
		if($_SESSION['trn'] == "")
		{
			$_SESSION['errTRN'] = "<span class='auto-width' style='color:red;'>TRN is <strong>invalid</strong></span>";
			$_SESSION['error1']++; //add 1 to the err SESSION
		}
		else{
			$_SESSION['errTRN'] = "<span class='auto-width' style='color:green;'>TRN is <strong>valid</strong></span>";
		}
		
		
		//check if err SESSION has a value
		if($_SESSION['error1'] == 0)
		{
			//track patient registration process
			$_SESSION['patientStatus1'] = "complete";
			
			//redirect to register if validate
			header("Location: addpatient2.php");
		}
		else
		{
			//redirect back to login page and display error message
			header("Location: addpatient.php");
		}
		
	}
?>