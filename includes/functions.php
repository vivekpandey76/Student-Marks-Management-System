<?php

// For infinityfree connection 
	// $servername = "sql113.epizy.com";
	// $dbusername = "epiz_26911468";
	// $dbpassword = "NCx4Y9MjTyb";
	// $dbname = "epiz_26911468_marks_system";
	
	
// for local connection 
	$servername = "localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "miniproject";
    
    $conn = mysqli_connect($servername, $dbusername, $dbpassword , $dbname);

		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error);
		}
?>                                                                                    