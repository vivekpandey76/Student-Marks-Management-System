<?php include 'header.php' ;?>
<?php 
 	if(!isset($_SESSION['userId'])) 
 		header("Location: login.php") ;
 ?>
<div id="mySidebar" class="sidebar">
	<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
 		<br>
 			<hr>
 			<div><a href="faculty_portal.php"><span class="glyphicon glyphicon-home "></span> Home</a>
 			</div>
 			<div><a href="smms.php"  ><span class="glyphicon glyphicon-book "></span> Students's Marks</a>
 			</div>
 			<div><a style="color: white" href="iat1.php"  ><span class="glyphicon glyphicon-text-height "></span> IAT-1</a>
 			</div>
 			<div><a href="iat2.php" ><span class="glyphicon glyphicon-text-width "></span> IAT-2</a>
 			</div>
 			<div><a href="attendance.php" ><span class="glyphicon glyphicon-calendar "></span> Attendance</a>
 			</div>
 			<div><a href="discussions.php" ><span class="glyphicon glyphicon-tags "></span> Discussions</a>
 			</div>
 			
 	</div>
  <div id="main">
 <button class="openbtn sidebar-heading" onclick="openNav()">☰</button> 
 	<div class="heading">IAT-1</div>
 	<form method=POST>
 		<input style="float:right" type="submit" value="RESET" name="reset"></input>
 	</form>
 	
 	<?php 
 	require 'includes/functions.php';
 	if(isset($_POST['reset'])){
 		$sql = "UPDATE `iat1` SET `1a` = 'default', `1b` = 'default', `2a` = 'default', `2b` = 'default', `3` = 'default', `4` = 'default', `final` = 'default' ";
 		mysqli_query($conn , $sql);
 	}
 	?>
 	<!-- <div class="container"> -->
 		<table class="table">
 			<tr>
 				<th>Sr. No</th>
 				<th>Name</th>
 				<th>Q. 1a</th>
 				<th>Q. 1b</th>
 				<th>Q. 2a</th>
 				<th>Q. 2b</th>
 				<th>Q. 3</th>
 				<th>Q. 4</th>
 				<th>Final</th>
 			</tr>
<?php 
	require 'includes/functions.php';
	if(isset($_POST['save_changes'])){

		foreach ($_POST['id'] as $id) {
			$one_a = $_POST['1a'][$id] ;
			$one_b = $_POST['1b'][$id] ;
			$two_a = $_POST['2a'][$id] ;
			$two_b = $_POST['2b'][$id] ;
			$three = $_POST['3'][$id] ;
			$four = $_POST['4'][$id] ;
			$final = $one_a + $one_b + $two_a + $two_b + $three + $four ;
			// $final = $_POST['final'][$id] ;

			$update = "UPDATE `iat1` SET `1a` = '$one_a', `1b` = '$one_b', `2a` = '$two_a', `2b` = '$two_b', `3` = '$three', `4` = '$four', `final` = '$final' WHERE `iat1`.`id` = $id " ;
			mysqli_query($conn , $update);
		}
	}

	$sql = "SELECT * FROM iat1";
	$result = $conn -> query($sql);
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			echo "<form method=POST><tr>
			<td >". $row['srno'] ."</td>
			<td >". $row['name'] ."</td>
			<td style='color:black;'><input type='number' style='text-align:center;' value='". $row['1a'] ."' name='1a[".$row['id']."]'></input></td>
			<td style='color:black;'><input type='number' style='text-align:center;' value='". $row['1b'] ."' name='1b[".$row['id']."]'></input></td>
			<td style='color:black;'><input type='number' style='text-align:center;' value='". $row['2a'] ."' name='2a[".$row['id']."]'></input></td>
			<td style='color:black;'><input type='number' style='text-align:center;' value='". $row['2b'] ."' name='2b[".$row['id']."]'></input></td>
			<td style='color:black;'><input type='number' style='text-align:center;' value='". $row['3'] ."' name='3[".$row['id']."]'></input></td>
			<td style='color:black;'><input type='number' style='text-align:center;' value='". $row['4'] ."' name='4[".$row['id']."]'></input></td>
			<td >". $row['final'] ."</td>
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

<script type="text/javascript">

 </script>

<?php include 'footer.php' ;?>