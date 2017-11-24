<?php

include('classes/db.php');
include('classes/Login.php');

if (!st_Login::stIsLoggedIn()) {
		if (!cl_Login::clIsLoggedIn()) {
			header ("location: index.php");
		}
	}

if(isset($_POST['confirm'])) {

		DB::query('DELETE FROM login_tokens WHERE st_userid=:st_userid OR cl_userid=:cl_userid', array(':st_userid'=>st_Login::stIsLoggedIn(), ':cl_userid'=>cl_Login::clIsLoggedIn()));
			
		} else {
				if(isset($_COOKIE['PFID'])) {
						DB::query('DELETE FROM login_tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['PFID'])));
				}
				
		}
				setcookie('PFID', '', time()-3600);
				setcookie('PFID_', '', time()-3600);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<link href="css/layout.css" rel="stylesheet" type-"text/css" />
	<link href="css/menu.css" rel="stylesheet" type-"text/css" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="text/javascript">
		function display_c(){
		var refresh=1000; // Refresh rate in milli seconds
		mytime=setTimeout('display_ct()',refresh)
	}
	</script>
	<title>Your Page</title>
	</head>
	<body>
		<div class="Holder">
			<div class="Header"><img height="70" src="images/cclogo.jpg"></div>
			<div class="NavBar">
				<nav>
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="#">Messages</a></li>
						<li><a href="#">Your Projects</a></li>
						<li><a href="#">Find Projects</a></li>
						<li><a href="logout.php">Log Out</a></li>
					</ul>
				</nav>				
			</div>
			<div class="Content">
				<div class="PageHeading">
					<h1>Project4u</h1>
				</div>
				<div class="ContentLeft">
					<div class="Form">
						<h2>Logout of your account?</h2>
						<p>Are you sure you'd like to logout?</p>
						<form action="logout.php" method="post">
						<input type="submit" name="confirm" value="Confirm">
						</form>
					</div>	
				</div>
				<div class="ContentRight">
					<b><?php echo date("l d F Y"); ?></b><br>
					<script>display_c;</script>
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
