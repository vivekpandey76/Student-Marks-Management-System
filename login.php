<?php require 'header.php' ;?>	
<div id="main">	
	<div class="heading">Faculty Login</div>
		<form class="login" action="includes/login.inc.php" method="POST">
			<?php 
			if (isset($_GET['error'])){
				if($_GET['error'] == "emptyfields"){
					echo '<p class="errors"><u>Fill All the Fields !</u></p>';
				}
				elseif($_GET['error'] == "wrongpwd1"){
					echo '<p class="errors"><u>Invalid Username or password !</u></p>';
				}
				elseif($_GET['error'] == "nouserexists"){
					echo '<p class="errors"><u>User doesn\'t Exists !</u></p>';
				}
			}
			?>
			
			<div class="fhead">Username : </div>
			<input class="input" type="name" name="user" placeholder="Your Username">
			<div class="fhead">Password : </div>
			<input class="input" type="Password" name="pass" placeholder="">
			<div class="small_text">Trouble signing in ?</div>
			<div style="text-align:center">
				<a href="student_login.php" class="cna" >Student Login</a>
			</div>
			<button type="submit" name= "submit" class="btn">Log in</button>
		</form>
</div>	
<?php require 'footer.php' ;?>