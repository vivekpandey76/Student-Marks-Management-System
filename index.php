
<?php require "header.php" ;?>

<style>

ol li {
	display: inline-block;
	border: 2px solid #2A2C2B;
	margin-right: 5px;
	margin-bottom: 10px;
	width: 48%;
	height: 50px;
	color: #2A2C2B;
	text-align: center;
	font-family: 'Sans-serif';
	font-size: 28px;
}

</style>
<div id="main">
	<div class="container">
		<div class="heading">Welcome Everyone ,<br> 
		This site is called Student marks management system .</div>
		<p class="heading">Features :</p>
		<ol type ="1">
			<li >Students marks management</li>
			<li >Marks Calculator</li>
			<li >Attendance manager</li>
			<li >Students discussions room</li>
		</ol>
		<div class="heading">Disclamer :</div>
		<p>This site is under construction . Discussions area not working properly . Only Home and Students marks are working properly .Students can view their marks . 4 students are currently registered . <br>
		For faculty login : <br>
		username : testuser <br>
		password : testpass <br>
		For student login : <br>
		username : firstname_lastname <br>
		password : firstname_srno <br>
		Read About us for more info .
		</p>
	</div>
</div>
<?php require 'footer.php' ;?>