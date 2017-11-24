<?php
include('classes/db.php');


if (isset($_POST['reset'])) {
	
	$cstrong = True;
	$token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
	$email = $_POST['email'];
	$user_id = DB::query('SELECT id FROM cl_users WHERE email=:email', array(':email'=>$email))[0]['id'];
	DB::query('INSERT INTO password_tokens VALUES (\'\', :token, :st_user_id, :cl_user_id)', array(':token'=>sha1($token), ':st_user_id'=>NULL, ':cl_user_id'=>$user_id));
	echo 'Email Sent!';
}

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
						<li><a href="index.php">Home</a></li>
					</ul>
				</nav>				
			</div>
			<div class="Content">
				<div class="PageHeading">
					<h1>Project4u</h1>
					<h2>Reset Your Password</h2>
				</div>
				<div class="ContentRight">
					<div class="Form">
					<br>
					<form action="cl_forgot_pass.php" method="post" />
						<table>
							<tr>
								<td>
								<input class="StyleTxtField" type="text" name="email" placeholder="Email address ..." /><p />
								</td>
							</tr>
							<tr>
								<td><input type="submit" name="reset" value="Reset Password" /></td>
							</tr>
						</table>
					</form>
					</div>
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