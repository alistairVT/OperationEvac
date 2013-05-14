<?php
session_start();
include('/includes/database.inc.php');
include('/includes/functions.inc.php');
if(isset($_SESSION ['user_id']))
{
	
	$userid = $_GET['userid'];
	
$query= "DELETE FROM users WHERE user_id = $userid";

	$result = mysqli_query($dbconn, $query);
	if($result)	redirectuser('account.php?deleted=true');
	else redirectuser('account.php?success=false');
}
else redirectuser('loginpage.php');
?>
