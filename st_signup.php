<?php //st_signup.php

include ('./classes/db.php');

if (isset($_POST['signup'])) {
		$username = $_POST['username'];
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		
		if (!DB::query('SELECT username FROM st_users WHERE username=:username', array(':username'=>$username))) {

				if(strlen($username) >= 3 && strlen($username) <= 32) {

						if (preg_match('/[a-zA-Z0-9_]+/', $username)) {

								if(strlen($password) >= 6 && strlen($password) <= 60) {

										if(filter_var($email, FILTER_VALIDATE_EMAIL)) {

												if(!DB::query('SELECT email FROM st_users WHERE email=:email', array(':email'=>$email))) {

											DB::query('INSERT INTO st_users VALUES (\'\', :username, :fname, :lname, :password, :email)', array(':username'=>$username, ':fname'=>$fname, ':lname'=>$lname, ':password'=>password_hash($password, PASSWORD_BCRYPT), ':email'=>$email));
												header("location: st_login.php");
											} else {
												header("location: st_signup.php");
											}

										} else {
												header("location: st_signup.php");
										}
								} else {
										header("location: st_signup.php");
								}
								} else {
										header("location: st_signup.php");
								}
						} else {
								header("location: st_signup.php");
						}
				} else {
						header("location: st_signup.php");
				}

}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<link href="css/layout.css" rel="stylesheet" type-"text/css" />
	<link href="css/menu.css" rel="stylesheet" type-"text/css" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script src="scripts/validate.js"></script>
	<title>Project4u</title>
	</head>
	<body>
		<div class="Holder">
			<div class="Header"><img height="70" src="images/cclogo.jpg"></div>
			<div class="NavBar">
				<nav>
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="projects.php">Projects</a></li>
					</ul>
				</nav>				
			</div>
			<div class="Content">
				<!-- <div class="PageHeading">
					<h1>GeekSpeak</h1>
				</div> -->
				<div class="ContentLeft">
					<h1>Project4u</h1>
					<img src="images/eng2.png" width="260" height="350">
				</div>
				<div class="ContentRight">
					<div class="Form">
					<h3>Join Project4u Now!</h3>
					<br><br>
					<form action="st_signup.php" method="post" name="signup" id="signup" onsubmit="return(validate());">
						<table>
							<tr>
								<td></td>
								<td>First Name:</td>
								<td><input class="StyleTxtField" type="text" name="fname" placeholder="First name ..." /></td>
							</tr>
							<tr>
								<td></td>
								<td>Last Name:</td>
								<td><input class="StyleTxtField" type="text" name="lname" placeholder="Last name ..." /></td>
							</tr>
							<tr>
								<td></td>
								<td>Email:</td>
								<td><input class="StyleTxtField" type="text" name="email" placeholder="Email address ..." /></td>
							</tr>
							<tr>
								<td></td>
								<td>Username:</td>
								<td><input class="StyleTxtField" type="text" name="username" placeholder="Username ..." /></td>
							</tr>
							<tr>
								<td></td>
								<td>Password:</td>
								<td><input class="StyleTxtField" type="password" name="password" placeholder="Password ..." /></td>
							</tr>
							<tr>
								<td></td>
								<td><input type="submit" name="signup" value="Signup!" /></td>
							</tr>
						</table>
					</form>
					</div>
				</div>
			<div class="Footer">
				<p>Chesterfield College<br>
				Infirmary Road<br>
				Chesterfield<br>
				S41 7NG</p>
				</div>
			</div>
		</div>
	</body>
</html>