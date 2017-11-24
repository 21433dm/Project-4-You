<?php //profile.php

include('classes/db.php');
include ('classes/Login.php');


if (!cl_Login::clIsLoggedIn()) {
	//code to insert info
	
if (isset($_POST['save'])) {
	$title = $_POST['title'];
    $post = $_POST['info'];
    $st_userid = st_Login::stIsLoggedIn();
                DB::query('INSERT INTO posts VALUES(\'\', :title, :post, :st_userid, :cl_userid)', array(':title'=>$title, ':post'=>$post, ':st_userid'=>$st_userid, ':cl_userid'=>NULL));  
}

} else {
	if (!st_Login::stIsLoggedIn()) {
	//code to insert info
	if (isset($_POST['save'])) {
	$title = $_POST['title'];
    $post = $_POST['info'];
	$cl_userid = cl_Login::clIsLoggedIn();
                DB::query('INSERT INTO posts VALUES(\'\', :title, :post, :st_userid, :cl_userid)', array(':title'=>$title, ':post'=>$post, ':st_userid'=>NULL, ':cl_userid'=>$cl_userid)); 
		
}
}
}
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
						<li><a href="change_pass.php">Change Password</a></li>
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
					<h2>Welcome <?php echo $_GET['username']; ?></h2>
				</div>
				<div class="ContentRight">
					<b><?php echo date("l d F Y"); ?></b><br>
					<script>display_c;</script>
				</div>
				<div class="ContentRight"><br>
					<form action="" method="post">
						<input type="text" name="searchbox" value="">
						<input type="submit" name="search" value="Search">
					</form>
				</div>
				<div class="ContentRight"><br>
				<p>Post your project information here</p>
					<form action="" method="post">
						<input class="StyleTxtField" type="text" name="title" placeholder="Project Title ..." /><br><br>					
						<textarea name="info" rows="20" cols="80" placeholder="Post here ..."></textarea>
						<p><input type="submit" name="save" value="Save"></p>
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
	</body>
</html>