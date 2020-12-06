<?php
    session_start();
    $_SESSION['errflag'] = 0;
    
    if(isset($_POST['lgsubmit']))
    {

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
            $query = "SELECT * FROM staff WHERE Email='$username' && password='$password'";
            $result = mysqli_query($conn, $query);

            if(mysqli_num_rows($result)== 1)
            {
                $_SESSION['lgerr'] = "<p style='color: green; font-weight:bold'>Username and Password match found.</p>";
                $_SESSION['username'] = $username;

                $row = mysqli_fetch_assoc($result);
                $_SESSION['id'] = $row['StaffID'];
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

    if(isset($_POST['addocsubmit']))
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

            //write and run query
            $query = "INSERT INTO `staff`(Name, Email, Password, Type) 
                      VALUES ('$docname','$docemail','$npass','Doctor')";
            
            mysqli_query($conn, $query) or die("Could not insert user information.".mysqli_error($conn));

            //close connection
            mysqli_close($conn);

            //redirect to admin dashboard
            header("Location: dashboard.php");
        }
        else{
            //redirect back to add-doctor.php page and display error messages
            header("Location: add-doctor.php");
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
                $_SESSION['msg']="Doctor Details updated Successfully";
            }

            //close connection
            mysqli_close($conn);

            //redirect to admin dashboard
            header("Location: manage-doctors.php");
        }

    }

    if(isset($_POST['addnursubmit']))
    {
        //capture admin information
        foreach($_POST as $key => $value)
        {
            $$key = $_SESSION[$key] = $value;
        }

        //validate admin information
        if($nursename == "")//validate nurse name
        {
            $_SESSION['nursenameerr'] = "<span class='auto-width' style='color: red;'>Nurse name is <strong>invalid</strong></span>";
			$_SESSION['errflag'] ++;
        }
        else{
            $_SESSION['nursenameerr'] = "<span class='auto-width' style='color:green;'>Nurse Name is <strong>valid</strong></span>";
        }

        if(filter_var($nurseemail, FILTER_VALIDATE_EMAIL))//validate email
        {
			$_SESSION['nursemaillerr'] = "<span class='auto-width' style='color: green;'>Email is <strong>valid</strong></span>";
			
		}
		else{
			$_SESSION['nursemaillerr'] = "<span class='auto-width' style='color: red;'>Email is <strong>invalid</strong></span>";
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

            //write and run query
            $query = "INSERT INTO `staff`(Name, Email, Password, Type) 
                      VALUES ('$nursename','$nurseemail','$npass','Nurse')";
            
            mysqli_query($conn, $query) or die("Could not insert user information.".mysqli_error($conn));

            //close connection
            mysqli_close($conn);

            //redirect to admin dashboard
            header("Location: dashboard.php");
        }
        else{
            //redirect back to add-nurse.php page and display error messages
            header("Location: add-nurse.php");
        }
    }

    if(isset($_POST['editnursubmit']))
    {
        //capture admin information
        foreach($_POST as $key => $value)
        {
            $$key = $_SESSION[$key] = $value;
        }

        //validate admin information
        if($nursename == "")//validate doc name
        {
            $_SESSION['nursenameerr'] = "<span class='auto-width' style='color: red;'>Nurse name is <strong>invalid</strong></span>";
			$_SESSION['errflag'] ++;
        }
        else{
            $_SESSION['nursenameerr'] = "<span class='auto-width' style='color:green;'>Nurse Name is <strong>valid</strong></span>";
        }

        if(filter_var($nurseemail, FILTER_VALIDATE_EMAIL))//validate email
        {
			$_SESSION['nursemaillerr'] = "<span class='auto-width' style='color: green;'>Email is <strong>valid</strong></span>";
			
		}
		else{
			$_SESSION['nursemaillerr'] = "<span class='auto-width' style='color: red;'>Email is <strong>invalid</strong></span>";
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
            $query = "UPDATE `staff` SET Name='$nursename', Email='$nurseemail', Password='$npass' WHERE StaffID='".$_SESSION['idk']."'";
            
            $sql = mysqli_query($conn, $query) or die("Could not update user information.".mysqli_error($conn));
            
            if($sql)
            {
                $_SESSION['msg']="Nurse Details updated Successfully";
            }

            //close connection
            mysqli_close($conn);

            //redirect to admin dashboard
            header("Location: manage-nurses.php");
        }

    }

    if(isset($_POST['changepwsubmit']))
    {
        include('include/config.php');

        $selQuery = "SELECT Password FROM staff WHERE password='".$_POST['cpass']."' && Email='".$_SESSION['username']."'";
        $result = mysqli_query($conn,$selQuery);
        
        //$num=mysqli_fetch_assoc($result);
        if(mysqli_num_rows($result)== 1)
        {
            $upQuery = "UPDATE staff SET password='".$_POST['npass']."' WHERE Email='".$_SESSION['username']."'";
            $res=mysqli_query($conn,$upQuery);
            $_SESSION['msg1']="Password Changed Successfully !!";
            //header("Location: change-password.php");
        }
        else
        {
            $_SESSION['msg1']="Old Password not match !!";
            //header("Location: change-password.php");
        }
        
        header("Location: change-password.php");
    }

?>