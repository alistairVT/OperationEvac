<?php
	session_start();
	include('/includes/functions.inc.php');
	if($_SERVER['REQUEST_METHOD']=='GET'){
		if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
			$_SESSION=array();
			session_destroy();
			redirectuser();
		}
		else redirectuser();
	}
	else redirectuser();
?>