<?php include 'header.php' ;?>
<?php 
 	if(!isset($_SESSION['userId']) && !isset($_SESSION['studentId']) ) 
 		header("Location: login.php") ;
 ?>
 <?php  
 if(isset($_SESSION['userId'])){
echo '<div id="mySidebar" class="sidebar">
	<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
 		<br>
 			<hr>
 			<div ><a href="faculty_portal.php"><span class="glyphicon glyphicon-home "></span> Home</a>
 			</div>
 			<div><a href="smms.php"  ><span class="glyphicon glyphicon-book "></span> Students\'s Marks</a>
 			</div>
 			<div><a  href="iat1.php"  ><span class="glyphicon glyphicon-text-height "></span> IAT-1</a>
      </div>
      <div><a href="iat2.php" ><span class="glyphicon glyphicon-text-width "></span> IAT-2</a>
      </div>
 			<div><a href="attendance.php" ><span class="glyphicon glyphicon-calendar "></span> Attendance</a>
 			</div>
 			<div ><a style="color: white" href="discussions.php" ><span class="glyphicon glyphicon-tags "></span> Discussions</a>
 			</div>
 			
 </div> '; 
} else if(isset($_SESSION['studentId'])){
 	 echo '<div id="mySidebar" class="sidebar">
 		<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
 		<br>
 			<hr>
 			<div ><a href="student_portal.php"><span class="glyphicon glyphicon-home "></span> Home</a>
 			</div>
 			<div><a href="view_marks.php"  ><span class="glyphicon glyphicon-book "></span> View Marks</a>
 			</div>
 			<div ><a style="color: white" href="discussions.php" ><span class="glyphicon glyphicon-tags "></span> Discussions</a>
 			</div>
 	</div> ';
} else{
	header("Location :login.php");
	exit();
}

?>
<div id="main">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<button class="openbtn sidebar-heading" onclick="openNav()">☰</button> 
 	<div class="heading">Discussions</div>
 	<div class="container">
 		<div class="chatbox">
 		<?php 
 		require_once "includes/functions.php";
 				$ql = 'SELECT * FROM message';
 				$rl = mysqli_query($conn,$ql);
 				// $no_of_rows = mysqli_num_rows($rl);
 				// echo $no_of_rows;
 				while ($row = mysqli_fetch_assoc($rl)){
 					$message = $row['message'];
 					$user_name = $row['user_name'];
 					echo '<div class="username">'.$user_name.' : </div>';
 					echo '<div class="message">'.$message.'</div>';
 					echo '<hr>';
 				}
 			if (isset($_POST['send_message'])) {
 				$message = $_POST['message'];
 				if(empty($message)){
 					header("Location: discussions.php");
 					exit();
 				}
 				else{

 					if(isset($_SESSION['userId'])){
 					$q = 'INSERT INTO message (id , message , user_name) VALUES ("", "'.$message.'" , "'.$_SESSION['userUId'].'") ';
 					if(mysqli_query($conn , $q)){
 						echo '<div class="username">'.$_SESSION['userUId'].' : </div>';
 						echo '<div class="message">'.$message.'</div>';
 					}
 				}

 					elseif (isset($_SESSION['studentId'])) {
 						$q = 'INSERT INTO message (id , message , user_name) VALUES ("", "'.$message.'" , "'.$_SESSION['studentName'].'") ';
 					if(mysqli_query($conn , $q)){
 						echo '<div class="username">'.$_SESSION['studentName'].' : </div>';
 						echo '<div class="message">'.$message.'</div>';
 					}
 					}

 					 else{
 						header("Location: login.php");
 						exit();
 					}

 					}
 				}
 		?>
 		</div>
 		<div class="send_area">
 			<form class="sending_area" method="POST">
 			<input type="text" id="inputText" placeholder="Type here..." name="message" class="textarea">
 			<button type="submit" name="send_message" class="send_button">
 				<i class="fas fa-paper-plane"></i>
 				<div>SEND</div>
 			</button>
 			</form>
 		</div>
 	</div>
 </div>

 <script>
 	
 	setInterval(auto_reload , 10000);
 	function auto_reload(){
 		location.reload();
 	}
 	var messageBody = document.querySelector('.chatbox');
messageBody.scrollTop = messageBody.scrollHeight - messageBody.clientHeight;
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
<?php include 'footer.php' ;?>