<?php // authenticate.php
	require_once 'dbconnect.php';

	$conn = new mysqli($hn, $un, $pw, $db);
	if ($conn->connect_error) die ($conn->connect_error);

	if (isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW']))
	{
		$un_temp = ($_SERVER['PHP_AUTH_USER']);
		$pw_temp = ($_SERVER['PHP_AUTH_PW']);

		$query = "SELECT * FROM users WHERE username = '$un_temp'";
		$result = $conn->query($query);
		if(!$result) die($conn->error);
		elseif ($result->num_rows)
		{
			$row = $result->fetch_array(MYSQLI_NUM);
			$result->close();

			if ($pw_temp == $row[4]) echo "$row[0] $row[1] :
			Hi $row[0], you are now logged in as '$row[3]'";
		else die("Invalid username/password combination");
		}
		else die("Invalid username/password combination");
	}
	else
	{
		header('WWW-Authenticate: Basic realm="Restricted Section"');
		header('HTTP/1.0 401 Unauthorized');
		die("Please enter your username and password");
		}
	$conn->close();
?>
