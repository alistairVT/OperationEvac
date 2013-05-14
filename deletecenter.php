<?php

	session_start();
	include('/includes/database.inc.php');
	include('/includes/functions.inc.php');
if(isset($_SESSION ['user_id']))
{
	
	$evacid = $_GET['evacid'];
	
	$query = "DELETE from evac where idevac = $evacid";
		//$query="$columnName = '$value',";

	
		
	$result = mysqli_query($dbconn, $query);
	if($result)	redirectuser('viewcenters.php?deleted=true');
	else redirectuser('viewcenters.php?success=false');
				

include('/includes/footer.inc.php');
	}
else redirectuser('loginpage.php');
?>

