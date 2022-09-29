<?php  require 'header.php'; ?>
<?php 
 	if(!isset($_SESSION['userId'])) 
 		header("Location: login.php") ;
 ?>
 	<div id="mySidebar" class="sidebar visible-xs">
 		<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
 		<br>
 			<hr>
 			<div ><a style="color: white" href="faculty_portal.php"><span class="glyphicon glyphicon-home "></span> Home</a>
 			</div>
 			<div><a href="smms.php"  ><span class="glyphicon glyphicon-book "></span> Students's Marks</a>
 			</div>
      <div><a  href="iat1.php"  ><span class="glyphicon glyphicon-text-height "></span> IAT-1</a>
      </div>
      <div><a href="iat2.php" ><span class="glyphicon glyphicon-text-width "></span> IAT-2</a>
      </div>
 			<div><a href="attendance.php" ><span class="glyphicon glyphicon-calendar "></span> Attendance</a>
 			</div>
 			<div><a href="discussions.php" ><span class="glyphicon glyphicon-comment "></span> Discussions</a>
 			</div>
 			
 	</div>
 <div id="main">
 	<button class="openbtn sidebar-heading visible-xs" onclick="openNav()">☰</button> 
 	<div class="heading" style="color:black">Hello there</div>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <style>
    	*{
  padding: 0;
  margin: 0;
}
body{
  background: #ccc;
  font-family: sans-serif;
}

.ul{
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  display: flex;
  margin: 0;
  padding: 0;
}
.ul .ul-li{
  list-style: none;
  margin: 0 5px;
}
.ul .ul-li .ul-li-a .fas{
  font-size: 40px;
  color: #333;
  line-height: 80px;
  transition: 0.5s;
  padding-right: 14px;
}
.ul .ul-li .ul-li-a span{
  font-size: 20px;
  padding: 0;
  margin: 0;
  position: absolute;
  top: 30px;
  color: #333;
  transition: 0.5s;
}
.ul .ul-li .ul-li-a{
  text-decoration: none;
  display: absolute;
  display: block;
  width: 210px;
  height: 80px;
  background: #fff;
  text-align: left;
  padding-left: 20px;
  transform: rotate(-30deg) skewX(25deg) translate(0, 0);
  transition: 0.5s;
  box-shadow: -20px 20px 10px rgba(0, 0, 0, 0.5);
}
.ul .ul-li .ul-li-a:before{
  content: '';
  position: absolute;
  top: 10px;
  left: -20px;
  height: 100%;
  width: 20px;
  background: #b1b1b1;
  transition: 0.5s;
  transform: rotate(0deg) skewY(-45deg);
}
.ul .ul-li .ul-li-a:after{
  content: '';
  position: absolute;
  bottom: -20px;
  left: -10px;
  height: 20px;
  width: 100%;
  background-color: #b1b1b1;
  transition: 0.5s;
  transform: rotate(0deg) skewX(-45deg);
}
.ul .ul-li .ul-li-a:hover{
  transform: rotate(-30deg) skew(25deg) translate(20px, -15px);
  box-shadow: -50px 50px 50px rgba(0, 0, 0, 0.5);
}
.ul .ul-li:hover .fas{
  color:#fff;
}
.ul .ul-li:hover span{
  color: #fff
}
.ul .ul-li:hover .ul-li-a{
  background-color: #dd4b39;
}
.ul .ul-li:hover .ul-li-a:before{
  background-color: #e66a5a;
}
.ul .ul-li:hover .ul-li-a:after{
  background-color: #e66a5a;
}
    </style>
<div class="nice-buttons hidden-xs ">
    <ul class="ul "  >
      <li class="ul-li">
        <a href="faculty_portal.php" class="ul-li-a ">
          <i class="fas fa-home"></i>
          <span> - Home</span>
        </a>
      </li>
      <li class="ul-li ">
        <a href="smms.php" class="ul-li-a">
          <i class="fas fa-book"></i>
          <span> - Marks</span>
        </a>
      </li>
      <li class="ul-li">
        <a href="iat1.php" class="ul-li-a">
          <i class="fas fa-marker"></i>
          <span> - IAT-1</span>
        </a>
      </li>
      <li class="ul-li">
        <a href="iat2.php" class="ul-li-a">
          <i class="fas fa-pen-nib"></i>
          <span> - IAT-2</span>
        </a>
      </li>
      <li class="ul-li">
        <a href="attendance.php" class="ul-li-a">
          <i class="fas fa-clipboard"></i>
          <span> - Attendance</span>
        </a>
      </li>
      <li class="ul-li">
        <a href="discussions.php" class="ul-li-a">
          <i class="fas fa-comments"></i>
          <span> - Discussions</span>
        </a>
      </li>
    </ul>
   </div>

 </div>
<?php include 'footer.php' ;?>

