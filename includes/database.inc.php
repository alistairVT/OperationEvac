<?php
	DEFINE('USER', 'root');
	DEFINE('PASSWORD', 'asanamanyourface');
	DEFINE('DATABASE', 'evacfinder');
	DEFINE('HOST', 'localhost');

	$dbconn = mysqli_connect(HOST, USER, PASSWORD, DATABASE);
	mysqli_set_charset($dbconn, 'utf8');
?>