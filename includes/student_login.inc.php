<?php 

if(isset($_POST['submit'])) {
	require 'functions.php';
	$username = $_POST['user'];
	$password = $_POST['pass'];

	if(empty($_POST['user']) || empty($_POST['pass'])) {
		header("Location: ../student_login.php?error=emptyfields&uid=".$username);
		exit();
	} else {
		$sql = "SELECT * FROM students WHERE username=?;";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt , $sql)) {
			header("Location: ../student_login.php?error=sql");
			exit();
		} else {
			mysqli_stmt_bind_param($stmt , "s" , $username );
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			if ($row = mysqli_fetch_assoc($result)) {
				if($password == $row['password']) {
					session_start();
					$_SESSION['studentId'] = $row['id'];
					$_SESSION['studentSrno'] = $row['srno'];
					$_SESSION['studentName'] = $row['name'];
					$_SESSION['studentUId'] = $row['username'];
					header("Location: ../student_portal.php");
					exit();
				} else {
					header("Location: ../student_login.php?error=wrongpwd1");
					exit();
				}
			} else {
				header("Location: ../student_login.php?error=nouserexists");
				exit();
			}
		}
	}
	$conn -> close();
}
?>