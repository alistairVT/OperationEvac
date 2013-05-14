<?php

	session_start();
	include('/includes/database.inc.php');
	include('/includes/functions.inc.php');

	
	$evacid = $_GET['evacid'];
	
	$query = "DELETE from evac where evacid = $evacid";
		//$query="$columnName = '$value',";

	
		
	$result = mysqli_query($dbconn, $query);
	if($result)	redirectuser('viewcenters.php?deleted=true');
	else redirectuser('viewcenters.php?success=false');
				
?>

