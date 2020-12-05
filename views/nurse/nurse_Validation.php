<?php
	//start session
	session_start();

	$_SESSION['errflag'] = 0;
	
	//Capture Login User input 
	if(isset($_POST['lgsubmit']))
    {
        //check user err
        //$_SESSION['errflag'] = 0;

        //capture admin information
        foreach($_POST as $key => $value)
        {
            $$key = $_SESSION[$key] = $value;
        }

        //validate admin information
        if(filter_var($username, FILTER_VALIDATE_EMAIL))
        {
			$_SESSION['emlerr'] = "<span class='auto-width' style='color: green;'>Email is <strong>valid</strong></span>";
			
		}
		else{
			//$_SESSION['emlerr'] = "<span class='auto-width' style='color: red;'>Email is <strong>invalid</strong></span>";
			$_SESSION['errflag'] ++;
        }
        
        if(preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}$/",$password)){
			$_SESSION['pwerr'] = "<span class='auto-width' style='color:green;'>Password is <strong>valid</strong></span>";
		}
		else{
			//$_SESSION['pwerr'] = "<span class='auto-width' style='color:red;'>Password is <strong>invalid</strong></span>";
			$_SESSION['errflag']++; //add 1 to the err SESSION
		}

        if($_SESSION['errflag'] == 0)
        {
            //connect to database
            include("include/config.php");

            //write select query
            $query = "SELECT Email, Password FROM staff WHERE Email='$username' && password='$password'";
            $result = mysqli_query($conn, $query);

            if(mysqli_num_rows($result)== 1)
            {
                $_SESSION['lgerr'] = "<p style='color: green; font-weight:bold'>Username and Password match found.</p>";
                $_SESSION['username'] = $username;

                //redirect to admin dashboard
                header("Location: dashboard.php");
                exit();
            }
            else{
                $_SESSION['lgerr'] = "<p style='color: red; font-weight:bold'>Username and Password not found.</p>";
                //redirect back to Admin Login page and display error messages
                header("Location: index.php");
                exit();
            }
        }
        else{
            $_SESSION['lgerr'] = "<p style='color: red; font-weight:bold'>Username and Password not found.</p>";
			//redirect back to Admin Login page and display error messages
            header("Location: index.php");
            //exit();
        }
    }
?>