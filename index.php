<?php //index.php

include('classes/db.php');

/*if (isset($_POST['submit'])) {
	if (isset($_POST['student'])) {
		header ("location: st_signup.php");
	} else {
		if (isset($_POST['client'])) {
		header ("location: cl_signup.php");
	}*/

?>

<DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<link href="css/layout.css" rel="stylesheet" type-"text/css" />
	<link href="css/menu.css" rel="stylesheet" type-"text/css" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<script src='scripts/javascript.js'></script>
	<title>Project4u</title>
	</head>
	<body>
		<div class="Holder">
			<div class="Header"><img height="70" src="images/cclogo.jpg"></div>
			<div class="NavBar">
				<nav>
					<ul>
						<li><a href="login.php">Login</a></li>
						<li><a href="st_signup.php">Student Signup</a></li>
						<li><a href="cl_signup.php">Client Signup</a></li>
					</ul>
				</nav>				
			</div>
			<div class="Content">
				<div class="PageHeading">
					<h1>Project4u</h1>
				</div>
				<div class="ContentLeft">
					<h2>Welcome to Project4u...</h2>
					<h6>... bringing students to projects and projects to students.</h6>
				</div>
				<div class="ContentRight">
					<img src="images/pm1.jpg" width="600" height="350">
				</div>
			</div>
			<div class="Footer">
				<p>Chesterfield College<br>
				Infirmary Road<br>
				Chesterfield<br>
				S41 7NG</p>
			</div>
		</div>
	</body>
</html>