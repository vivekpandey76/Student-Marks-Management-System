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
 			<div ><a style="color: white" href="smms.php"  ><span class="glyphicon glyphicon-book "></span> Students's Marks</a>
 			</div>
 			<div><a  href="iat1.php"  ><span class="glyphicon glyphicon-text-height "></span> IAT-1</a>
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
 	<div class="heading">SMMS</div>
 	<button class="normal-button" type="button" onclick="review()" >Review</button>
 	<!-- <div class="container"> -->
 		<table class="table">
 			<tr>
 				<th>Sr. No</th>
 				<th>Name</th>
 				<th>Iat-1</th>
 				<th>Iat-2</th>
 				<th>Attendance</th>
 				<th>Final AVG</th>
 			</tr>
<?php 
	require 'includes/functions.php';
	if(isset($_POST['save_changes'])){

		foreach ($_POST['id'] as $id) {
			$srno = $_POST['srno'][$id] ;
			$Name = $_POST['Name'][$id] ;
			$iat1 = $_POST['iat1'][$id] ;
			$iat2 = $_POST['iat2'][$id] ;	
			$final = ($iat1 + $iat2)/2 ;
			// $final = $_POST['final'][$id] ;

			$update = "UPDATE `marks` SET `srno` = '$srno',`Name` = '$Name', `iat1` = '$iat1', `iat2` = '$iat2', `final` = '$final' WHERE `marks`.`id` = $id " ;
			mysqli_query($conn , $update);
		}
	}

	$query1 = "UPDATE marks SET iat1=(SELECT final FROM iat1 WHERE marks.srno=iat1.srno) ";
	mysqli_query($conn, $query1);
	$query2 = "UPDATE marks SET iat2=(SELECT final FROM iat2 WHERE marks.srno=iat2.srno) ";
	mysqli_query($conn, $query2);
	$query3 = "UPDATE marks SET attendance=(SELECT attendance FROM attendance WHERE marks.srno=attendance.srno) ";
	mysqli_query($conn, $query3);

	$sql = "SELECT * FROM marks";
	$result = $conn -> query($sql);
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
		 echo "<form method=POST>";
			echo "<tr>
			<td >". $row['srno'] ."</td>
			<td >". $row['Name'] ."</td>
			<td style='color:black;'><input type='number' style='text-align:center;' value='". $row['iat1'] ."' name='iat1[".$row['id']."]'></input></td>
			<td style='color:black;'><input type='number' style='text-align:center;' value='". $row['iat2'] ."' name='iat2[".$row['id']."]'></input></td>
			<td >". $row['attendance'] ."</td>
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
 	
 	function review() {

 		var iat1 = 0 ;
 		var iat2 = 0 ;
 		for(var i = 1; i<=4 ; i++){
 			var val1 = parseFloat(document.querySelector(".table").rows[i].cells.item(2).innerHTML);
 			console.log(val1);
 			var val2 = parseFloat(document.querySelector(".table").rows[i].cells.item(3).innerHTML);
 			console.log(val2);
 			if (val1 > val2) {
 				iat1++;
 			}else if(val1 == val2){
 				iat1++;
 				iat2++;
 			}
 			else {
 				iat2++;
 			}
 		}
 		if (iat1 > iat2) {
 			alert("More students scored more in IAT-1");
 		}
 		else if(iat1 == iat2){
 			alert("Students scored equally in both tests.");
 		}
 		else{
 			alert("More students scored more in IAT-2");
 		}

 	}

 </script>
<?php include 'footer.php' ;?>