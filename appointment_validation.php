<?php
    session_start();

    $_SESSION['errflag'] = 0;
    
    if(isset($_POST['addapsubmit']))
    {
        //capture admin information
        foreach($_POST as $key => $value)
        {
            $$key = $_SESSION[$key] = $value;
        }

        //validate admin information
        if($fname != "")//validate first name
        {
            $_SESSION['fnameerr'] = "<span class='auto-width' style='color:green;'>First Name is <strong>valid</strong></span>";
        }
        else{
            $_SESSION['fnameerr'] = "<span class='auto-width' style='color: red;'>First Name is <strong>invalid</strong></span>";
			$_SESSION['errflag'] ++;
        }

        if($lname != "")//validate last name
        {
			$_SESSION['lnameerr'] = "<span class='auto-width' style='color: green;'>Last Name is <strong>valid</strong></span>";
			
		}
		else{
			$_SESSION['lnameerr'] = "<span class='auto-width' style='color: red;'>Last Name is <strong>invalid</strong></span>";
			$_SESSION['errflag'] ++;
        }

        if($_SESSION['errflag'] == 0)
        {
            //connect to database
            include("views/admin/include/config.php");
            
            $did = $_GET['id'];
            //write and run query
            $query = "INSERT INTO `guest_appointment`(FirstName, LastName, Date) VALUES ('$fname','$lname','$date')";
            
            $sql = mysqli_query($conn, $query) or die("Could not update user information.".mysqli_error($conn));
            
            if($sql)
            {
                $_SESSION['msg']="Appointment created Successfully";
            }

            //close connection
            mysqli_close($conn);

            //redirect to admin dashboard
            header("Location: index.php");
        }
        else{
            
        }

    }

    if(isset($_POST['submit']))
	{
        include("include/config.php");
		$trn = $_POST['trn']; //get patient trn
		$id = $_POST['docid']; //get doctor id
		$appdate=$_POST['appdate']; // get appointment date
		$time=$_POST['apptime']; // get appointment time
		$status = "Pending"; // appoinment status
		
		$query = "INSERT INTO `appointment`(`TRN`, `StaffID`, `Date`, `Time`, `ReasonForVisit`, `Status`) VALUES 
					('$trn','$id','$appdate','$time','$status')";

		$result = mysqli_query($conn,$query);

		if($result)
		{
            echo "<script>alert('Your appointment successfully booked');</script>";
            header("Location: book-appointment.php");
		}

		//mysqli_close($conn);
	}
?>