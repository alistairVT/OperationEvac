<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" name="viewport" content="initial-scale=1.0, user-scalable=no"/>
	<title>Operation Evac</title>
	<link rel="stylesheet" type="text/css" href="css/main.css"/>
	<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
	<?php
		if(isset($page))
		{
			if($page == 'register' || $page == 'modifyuser')
				echo '<script type = "text/javascript" src = "js/formchecker.js"></script>';
		}
	?>
</head>
<body onload="initialize()">
<?php 
	
	if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){ 
		include('/includes/navigationbarIN.inc.php');
		//include('/includes/buttons.inc.php');
				echo '<div id="maincontainer">';
	}
	else{
		include('/includes/navigationbar.inc.php');
		echo '<div id="maincontainer" class="login">';
	}
?>
