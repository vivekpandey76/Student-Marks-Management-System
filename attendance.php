<?php include 'header.php' ;?>
<?php 
 	if(!isset($_SESSION['userId'])) 
 		header("Location: login.php") ;
 ?>
<div id="mySidebar" class="sidebar">
	<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
 		<br>
 			<hr>
 			<div ><a href="faculty_portal.php"><span class="glyphicon glyphicon-home "></span> Home</a>
 			</div>
 			<div><a href="smms.php"  ><span class="glyphicon glyphicon-book "></span> Students's Marks</a>
 			</div>
 			<div><a  href="iat1.php"  ><span class="glyphicon glyphicon-text-height "></span> IAT-1</a>
      </div>
      <div><a href="iat2.php" ><span class="glyphicon glyphicon-text-width "></span> IAT-2</a>
      </div>
 			<div ><a style="color: white" href="attendance.php" ><span class="glyphicon glyphicon-calendar "></span> Attendance</a>
 			</div>
 			<div><a href="discussions.php" ><span class="glyphicon glyphicon-tags "></span> Discussions</a>
 			</div>
 			
 	</div>
 <div id="main">
 <button class="openbtn sidebar-heading" onclick="openNav()">☰</button> 
 	<div class="heading">Attendance</div>
 	<form method=POST>
 		<input style="float:right" type="submit" value="RESET" name="reset"></input>
 	</form>
 	
 	<?php 
 	require 'includes/functions.php';
 	if(isset($_POST['reset'])){
 		$sql = "UPDATE `attendance` SET `lectures` = 'default', `attendance` = 'default' ";
 		mysqli_query($conn , $sql);
 	}
 	?>
 	<!-- <div class="container"> -->
 		<form method="POST">
 			<div>Enter total no of lectures :</div>
 			<input type="number" name="no_of_lectures" value="50">
 			<div>Enter attendance consists of how many marks :</div>
 			<input type="number" name="attendance_marks" value="5">
 			<div>(NOTE : Both of these values will reset to 50 and 5 after you press submit button)</div>
 		<table class="table">
 			<tr>
 				<th>Sr. No</th>
 				<th>Name</th>
 				<th>No. of lectures attended</th>
 				<th>Final Attendance</th>
 			</tr>
<?php 
	require 'includes/functions.php';
	if(isset($_POST['save_changes'])){
		$no_of_lectures = $_POST['no_of_lectures'];
		$attendance_marks = $_POST['attendance_marks'];
		foreach ($_POST['id'] as $id) {
			$lectures = $_POST['lectures'][$id] ;
			$final = ($lectures/$no_of_lectures)*$attendance_marks ;
			// $final = $_POST['final'][$id] ;

			$update = "UPDATE `attendance` SET `lectures` = '$lectures', `attendance` = '$final' WHERE `attendance`.`id` = $id " ;
			mysqli_query($conn , $update);
		}
	}

	$sql = "SELECT * FROM attendance";
	$result = $conn -> query($sql);
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			echo "<tr>
			<td >". $row['srno'] ."</td>
			<td >". $row['name'] ."</td>
			<td style='color:black;'><input type='number' style='text-align:center;' value='". $row['lectures'] ."' name='lectures[".$row['id']."]'></input></td>
			<td >". $row['attendance'] ."</td>
			<td><input type='hidden' name='id[]' value='".$row['id']."' ></td>
			</tr>";
		}
		echo "</table>";
		echo "<input type='submit' name = 'save_changes'></input></form>";
	} else {
		echo "Nothing to display !";
	}

 ?>
 </div>
<?php include 'footer.php' ;?>