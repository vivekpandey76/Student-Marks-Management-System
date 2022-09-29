<?php include 'header.php' ?>
<?php 
 	if(!isset($_SESSION['studentId'])) 
 		header("Location: student_login.php") ;
 ?>
 <div id="mySidebar" class="sidebar">
 		<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
 		<br>
 			<hr>
 			<div ><a style="color: white;" href="student_portal.php"><span class="glyphicon glyphicon-home "></span> Home</a>
 			</div>
 			<div><a href="view_marks.php"  ><span class="glyphicon glyphicon-book "></span> View Marks</a>
 			</div>
 			<div><a href="discussions.php" ><span class="glyphicon glyphicon-tags "></span> Discussions</a>
 			</div>
 	</div>
 <div id="main">
 	<button class="openbtn sidebar-heading" onclick="openNav()">☰</button> 
	<div class="heading">This is Students area
		<p>Welcome <?php echo $_SESSION["studentName"] ; ?></p>
		<p>Your Sr. no : <?php echo  $_SESSION["studentSrno"]; ?></p>
	</div>
 </div>

<?php include 'footer.php' ?>