<?php include 'header.php' ?>
<?php 
 	if(!isset($_SESSION['studentId'])) 
 		header("Location: student_login.php") ;
 ?>
 <div id="mySidebar" class="sidebar">
 		<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
 		<br>
 			<hr>
 			<div ><a href="student_portal.php"><span class="glyphicon glyphicon-home "></span> Home</a>
 			</div>
 			<div ><a style="color: white;" href="view_marks.php"  ><span class="glyphicon glyphicon-book "></span> View Marks</a>
 			</div>
 			<div><a href="discussions.php" ><span class="glyphicon glyphicon-tags "></span> Discussions</a>
 			</div>
 	</div>
 <div id="main">
 	<button class="openbtn sidebar-heading" onclick="openNav()">☰</button> 
	<div class="heading">My Marks </div>
	<table class="table" >
 		<tr>
 			<th>Sr. No</th>
 			<th>Name</th>
			<th>Iat-1</th>
 			<th>Iat-2</th>
 			<th>Attendance</th>
 			<th>Final</th>
		</tr>
<?php  require 'includes/functions.php';
$srno = $_SESSION['studentSrno'];
$query = "SELECT * FROM marks WHERE srno=$srno ";
$result = $conn -> query($query);
$row = $result -> fetch_assoc();
	echo "<tr>
	<td>".$row['srno']."</td>
	<td>".$row['Name']."</td>
	<td>".$row['iat1']."</td>
	<td>".$row['iat2']."</td>
	<td>".$row['attendance']."</td>
	<td>".$row['final']."</td>
	</tr>";
?>
	</table>
 </div>

<?php include 'footer.php' ?>