<?php
	//start session
	session_start();

	$_SESSION['errflag'] = 0;
	//Capture Login User input 
	if(isset($_POST["loginSubmit"]))
	{
		
		
		//var_dump($_POST);
		
		//Keep track of user errors
		$_SESSION['err'] = 0;
		
		
		foreach($_POST as $key => $value )
		{
			$$key = $value;
		}
		
		//$username = $_SESSION['username'];
		//$password = $_SESSION['password'];


		//validate username and password
		if(isset($username))
		{
			$_SESSION['errUser'] = "<span class='auto-width' style='color: green;'>Email is <strong>valid</strong></span>";
		}
		else{
			$_SESSION['errUser'] = "<span class='auto-width' style='color: red;'>Email is <strong>invalid</strong></span>";
			$_SESSION['err']++; //add 1 to the err SESSION
		}
		
		if(preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}$/",$password))
		{
			$_SESSION['errPassword'] = "<span class='auto-width' style='color:green;'>Password is <strong>valid</strong></span>";
		}
		else{
			$_SESSION['errPassword'] = "<span class='auto-width' style='color:red;'>Password is <strong>invalid</strong></span>";
			$_SESSION['err']++; //add 1 to the err SESSION
		}
		var_dump($_SESSION);
		//check if err SESSION has a value
		if($_SESSION['err'] == 0)
		{
			 //connect to database
			 include("include/config.php");
			 //$conn = mysqli_connect("localhost","root","","avocadomc_db");

			//write select query
            $query = "SELECT Email, Password FROM staff WHERE Email='$username' && password='$password'";
            $result = mysqli_query($conn, $query);

			if(mysqli_num_rows($result)== 1)
            {
                //$_SESSION['lgtoken'] = "Logged";
                //$_SESSION['username'] = $username;
                //$_SESSION['password'] = $password;

                //redirect to doc dashboard
                header("Location: dashboard.php");
                //exit();
            }
            else{
                $_SESSION['lgerr'] = "<p style='color: red; font-weight:bold'>Username and Password not found.</p>";
                //redirect back to doc Login page and display error messages
                //header("Location: index.php");
                //exit();
            }
		}
		else
		{
			$_SESSION['lgerr'] = "<p style='color: red; font-weight:bold'>Username and Password not found.</p>";
			//redirect back to doc Login page and display error messages
            header("Location: index.php");
		}
		
	}

	if(isset($_POST['editdocsubmit']))
    {
        //capture admin information
        foreach($_POST as $key => $value)
        {
            $$key = $_SESSION[$key] = $value;
        }

        //validate admin information
        if($docname == "")//validate doc name
        {
            $_SESSION['docnameerr'] = "<span class='auto-width' style='color: red;'>Doctor name is <strong>invalid</strong></span>";
			$_SESSION['errflag'] ++;
        }
        else{
            $_SESSION['docnameerr'] = "<span class='auto-width' style='color:green;'>Doctor Name is <strong>valid</strong></span>";
        }

        if(filter_var($docemail, FILTER_VALIDATE_EMAIL))//validate email
        {
			$_SESSION['docmaillerr'] = "<span class='auto-width' style='color: green;'>Email is <strong>valid</strong></span>";
			
		}
		else{
			$_SESSION['emlerr'] = "<span class='auto-width' style='color: red;'>Email is <strong>invalid</strong></span>";
			$_SESSION['errflag'] ++;
        }
        
        if(preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}$/",$npass))//validate password
        {
			$_SESSION['pwerr'] = "<span class='auto-width' style='color:green;'>Password is <strong>valid</strong></span>";
		}
		else{
			$_SESSION['pwerr'] = "<span class='auto-width' style='color:red;'>Password is <strong>invalid</strong></span>";
			$_SESSION['errflag']++; //add 1 to the err SESSION
        }

        if($_SESSION['errflag'] == 0)
        {
            //connect to database
            include("include/config.php");
            
            $did = $_GET['id'];
            //write and run query
            $query = "UPDATE `staff` SET Name='$docname', Email='$docemail', Password='$npass' WHERE StaffID='".$_SESSION['idk']."'";
            
            $sql = mysqli_query($conn, $query) or die("Could not update user information.".mysqli_error($conn));
            
            if($sql)
            {
                $_SESSION['msg']= "<script>alert('Doctor Details updated Successfully');</script>";
            }

            //close connection
            mysqli_close($conn);

            //redirect to admin dashboard
            header("Location: manage-doctors.php");
        }

    }
?>