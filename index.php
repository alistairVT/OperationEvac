<?php
	session_start();
	include('/includes/database.inc.php');
	include('/includes/functions.inc.php');
	include('/includes/header.inc.php');
	if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
		include('/includes/homepage.inc.php');
	else //include('/includes/loginpage.inc.php');
	{redirectuser('viewcenters.php');
	}
?>
	
