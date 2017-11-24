<?php
include ('./classes/db.php');

if (isset($_POST['login'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];

		if (DB::query('SELECT username FROM cl_users WHERE username=:username', array(':username'=>$username))) {

				if (password_verify($password, DB::query('SELECT password FROM cl_users WHERE username=:username', array(':username'=>$username))[0]
					['password'])) {
						
						$cstrong = True;
						$token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
						$cl_userid = DB::query('SELECT id FROM cl_users WHERE username=:username', array(':username'=>$username))[0]['id'];
						DB::query('INSERT INTO login_tokens VALUES (\'\', :token, :st_userid, :cl_userid)', array(':token'=>sha1($token), ':st_userid'=>NULL, ':cl_userid'=>$cl_userid));

						setcookie("PFID", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE);
						setcookie("PFID_", '1', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE);
						header ("location: profile.php?username=$username");

				} else {
						header("location: cl_login.php");
				}

		} else {
				header("location: cl_login.php");
		}
	}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<link href="css/layout.css" rel="stylesheet" type-"text/css" />
	<link href="css/menu.css" rel="stylesheet" type-"text/css" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script src='scripts/validate.js'></script>
	<title>Project4u</title>
	</head>
	<body>
		<div class="Holder">
			<div class="Header"><img height="70" src="images/cclogo.jpg"></div>
			<div class="NavBar">
				<nav>
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="cl_forgot_pass.php">Forgot Password</a></li>
						<li><a href="projects.php">Projects</a></li>
					</ul>
				</nav>				
			</div>
			<div class="Content">
				<div class="ContentLeft">
					<h1>Project4u</h1>
					<img src="images/eng.png" width="260" height="350">
				</div>
				<div class="ContentRight">
					<div class="Form">
					<h3>Login to Your Profile</h3>
					<br><br>
					<form action="cl_login.php" method="post" name="login" id="login" />
						<table>
							<tr>
								<td>Username:</td>
								<td><input class="StyleTxtField" type="text" name="username" placeholder="Username ..." /></td>
							</tr>
							<tr>
								<td></td>
							</tr>
							<tr>
								<td>Password:</td>
								<td><input class="StyleTxtField" type="password" name="password" placeholder="Password ..." /></td>
							</tr>
							<tr>
								<td></td>
							</tr>
							<tr>
								<td><input type="submit" name="login"value="Login" /></td>
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