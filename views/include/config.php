<?php
	//CONFIGURE DATABASE CONNECTION
	
	//define and initialize variables
	define('DB_SERVER','localhost');
	define('USER','root');
	define('PASS' ,'');
	define('DB_NAME', 'avocadomc_db');

	//connect to the database with connection string
	$conn = mysqli_connect(DB_SERVER,USER,PASS,DB_NAME);

	// Check connection
	if (mysqli_connect_errno())
	{
	 echo "Failed to connect to 'Avocadomc_db' Database: " . mysqli_connect_error();
	}

?>