<?php //cookie.php
// create cookie
	setcookie('username', 363391, time() + 60 * 60 * 24 * 7, '/');

//access cookie
	if(isset($_COOKIE['username'])) $username = $_COOKIE['username'];

//destroy cookie
	setcookie('username', 363391, time() + 2592000, '/');
?>
