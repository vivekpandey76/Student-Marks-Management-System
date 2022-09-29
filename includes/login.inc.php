<?php 

if(isset($_POST['submit'])) {
	require 'functions.php';
	$username = $_POST['user'];
	$password = $_POST['pass'];

	if(empty($_POST['user']) || empty($_POST['pass'])) {
		header("Location: ../login.php?error=emptyfields&uid=".$username);
		exit();
	} else {
		$sql = "SELECT * FROM users WHERE username=?;";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt , $sql)) {
			header("Location: ../login.php?error=sql");
			exit();
		} else {
			mysqli_stmt_bind_param($stmt , "s" , $username );
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			if ($row = mysqli_fetch_assoc($result)) {
				// $pwdCheck = password_verify($password , $row['password']);
				if($password == $row['password']) {
					session_start();
					$_SESSION['userId'] = $row['id'];
					$_SESSION['userUId'] = $row['username'];
					header("Location: ../faculty_portal.php");
					exit();
				}
				 else {
					header("Location: ../login.php?error=wrong password2");
					exit();
				}
			} else {
				header("Location: ../login.php?error=nouserexists");
				exit();
			}
		}
	}
	$conn -> close();
}
?>