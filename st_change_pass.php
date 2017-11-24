<?php
include ('classes/db.php');
include ('classes/Login.php');

if (st_Login::stIsLoggedIn()) {
				
			if(isset($_POST['changepass'])) {

			$oldpass = $_POST['oldpass'];
            $newpass = $_POST['newpass'];
            $newconfirm = $_POST['newconfirm'];
            $userid = st_Login::stIsLoggedIn();

            if (password_verify($oldpass, DB::query('SELECT password FROM st_users WHERE id=:id', array(':id'=>$userid))[0]['password'])) {
                        if ($newpass == $newconfirm) {
                                if (strlen($newpass) >= 6 && strlen($newpass) <= 60) {
                                        DB::query('UPDATE st_users SET password=:newpass WHERE id=:id', array(':newpass'=>password_hash($newpass, PASSWORD_BCRYPT), ':id'=>$userid));
                                        header ("location: profile.php?username=$username");
                                }
                        } else {
                                echo 'Passwords don\'t match!';
                        }
                } else {
                        echo 'Incorrect old password!';
                }



		}

} else {
		die('Not logged in!');
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
						<li><a href="profile.php">Back</a></li>
					</ul>
				</nav>				
			</div>
			<div class="Content">
				<div class="ContentLeft">
					<h1>Project4u</h1>
				</div>
				<div class="ContentRight">
					<div class="Form">
					<h3>Change your password</h3>
					<br><br>
					<form action="st_change_pass.php" method="post">
						<table>
							<tr>
								<td>Old Password:</td>
								<td><input class="StyleTxtField" type="password" name="oldpass" value="" placeholder="Current password..."></td>
							</tr>
							<tr>
								<td>New Password:</td>
								<td><input class="StyleTxtField" type="password" name="newpass" value="" placeholder="New password..."></td>
							</tr>
							<tr>
								<td>Confirm Password:</td>
								<td><input class="StyleTxtField" type="password" name="newconfirm" value="" placeholder="Confirm password..."></td>
							</tr>
							<tr>
								<td><input type="submit" name="changepass" value="Change password..."></td>
							</tr>
							</form>
						</table>					
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

				