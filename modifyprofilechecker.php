<?php
	session_start();
	include('/includes/database.inc.php');
	include('/includes/functions.inc.php');

	$formArray = array();


	$username = $_POST['username'];
	$escapedUsername = escapeString($dbconn, $username);
	$formArray['username'] = $escapedUsername;

	$password = $_POST['password'];
	$escapedPassword = escapeString($dbconn, $password);
	$formArray['password'] = $escapedPassword;

	$firstname = $_POST['firstname'];
	$escapedFirstname = escapeString($dbconn, $firstname);
	$formArray['firstname'] = $escapedFirstname;

	$lastname = $_POST['lastname'];
	$escapedLastname = escapeString($dbconn, $lastname);
	$formArray['lastname'] = $escapedLastname;

	$email = $_POST['email'];
	$escapedEmail = escapeString($dbconn, $email);
	$formArray['email'] = $escapedEmail;

	$address = $_POST['address'];
	$escapedAddress = escapeString($dbconn, $address);
	$formArray['address'] = $escapedAddress;

	if(!empty($_POST['telno'])){
		$telNumber = $_POST['telno'];
		$escapedTelNumber = escapeString($dbconn, $telNumber);
	}

	$mobileNum = $_POST['mobino'];
	$escapedMobileNum = escapeString($dbconn, $mobileNum);
	$formArray['mobinum'] = $escapedMobileNum;

	$query = "UPDATE users SET ";
	$infoCount=0;
	foreach ($formArray AS $columnName => $value){
		if($columnName == 'password')
			$query.="$columnName = SHA('$value'),";
		else $query.="$columnName = '$value',";
	}

	if(isset($telNumber))
		$query.=" telno = '$escapedTelNumber'";
	else $query.="telno = NULL";

	$query.= " WHERE user_id = {$_SESSION['user_id']}";

	$result = mysqli_query($dbconn, $query);
	if($result){
		$query = "SELECT * FROM users WHERE user_id={$_SESSION['user_id']}";
		$result = mysqli_query($dbconn, $query);
		if($result) $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		userlogin($row);		
		redirectuser('modifyprofile.php?success=true');


	}
	else redirectuser('modifyprofile.php?success=false');

?>