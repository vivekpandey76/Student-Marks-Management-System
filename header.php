<?php session_start() ?>
<?php require 'includes/functions.php';?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" lang="en-US">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>S.M.M.S</title>
	<link rel="stylesheet" type="text/css" href="css&js/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css&js/styles.css">
	<link href="https://fonts.googleapis.com/css2?family=Bangers&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Bangers&family=Open+Sans+Condensed:wght@300&display=swap" rel="stylesheet">
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<span class="navbar-brand text-center">Universal College Of Engineering</span>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapsable-nav">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div id="collapsable-nav" class="collapse navbar-collapse">
				<ul class="nav navbar-nav navbar-right">
					<?php 
					if(!isset($_SESSION['userId']) && !isset($_SESSION['studentId']) ) {
					echo '
					<li><a href="index.php" id="navlist"><span class="glyphicon glyphicon-home icon"></span>Home</a></li>
					<li><a href="login.php" id="navlist"><span class="glyphicon glyphicon-log-in icon"></span>Login</a></li>
					<li><a href="student_login.php" id="navlist"><span class="glyphicon glyphicon-user icon"></span>Student Login</a></li>' ;
				}
					?>
					<?php if(isset($_SESSION['userId']) || isset($_SESSION['studentId']) ){ 
						echo '<li id="navlist" >
						<form action="includes/logout.php" method="POST" ><span class="glyphicon glyphicon-off icon"><button type="submit" name="logout" >LOGOUT</button></form></li>'; }
					?>
				</ul>
			</div>
		</div>
	</nav>
	