<?php
	session_start();
	include('/includes/database.inc.php');
	include('/includes/functions.inc.php');


	$oldpass = $_POST['oldpass'];
	$escapedOldpassword = escapeString($dbconn, $oldpass);

	$newpass = $_POST['pass'];
	$escapedNewpassword = escapeString($dbconn, $newpass);
	

	$pass2 = $_POST['pass2'];
	$escapedPass2 = escapeString($dbconn, $pass2);
	
	$query = "SELECT password from users WHERE user_id = {$_SESSION['user_id']} and password = SHA('$escapedOldpassword')";
	$result = mysqli_query($dbconn, $query);
	if(($result && mysqli_num_rows($result)) && ($newpass == $pass2)){
		$query = "UPDATE users SET password = SHA('$escapedPass2') WHERE user_id = {$_SESSION['user_id']}";
		
		$result = mysqli_query($dbconn, $query);
		if($result){
			redirectuser('changepass.php?success=true');

		}
	}
	else redirectuser('changepass.php?success=false');

?>