<?php
	//Capture Login User input 
	if(isset($_POST["loginSubmit"]))
	{
		//start session
		session_start();
		
		//var_dump($_POST);
		
		//Keep track of user errors
		$_SESSION['err'] = 0;
		
		//store username and password in temp variables
		/*$user = $_POST["username"];
		$password = $_POST["password"];*/
		
		foreach($_POST as $key => $value )
		{
			$_SESSION[$key] = $value;
		}
		
		//validate username and password
		if($_SESSION['username'] != "amcadmin")
		{
			$_SESSION['errUser'] = "<span class='auto-width' style='color:red;'>Username is <strong>invalid</strong></span>";
			$_SESSION['err']++; //add 1 to the err SESSION
		}
		else{
			$_SESSION['errUser'] = "<span class='auto-width' style='color:green;'>Username is <strong>valid</strong></span>";
		}
		
		if($_SESSION['password'] != "fatpear#123")
		{
			$_SESSION['errPassword'] = "<span class='auto-width' style='color:red;'>Password is <strong>invalid</strong></span>";
			$_SESSION['err']++; //add 1 to the err SESSION
		}
		else{
			$_SESSION['errPassword'] = "<span class='auto-width' style='color:green;'>Password is <strong>valid</strong></span>";
		}
		
		//check if err SESSION has a value
		if($_SESSION['err'] == 0)
		{
			//track if user has logged in
			$_SESSION['loginStatus'] = "loggedIn";
			
			//redirect to register if validate
			header("Location:../addpatient.php");
		}
		else
		{
			//redirect back to login page and display error message
			header("Location:index.php");
		}
		
	}
?>