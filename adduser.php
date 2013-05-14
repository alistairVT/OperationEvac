<?php

	session_start();
	include('/includes/database.inc.php');
	include('/includes/functions.inc.php');

	$formArray = array();

	$firstname = $_POST['firstname'];
	$escapedfirstname = escapeString($dbconn, $firstname);
	$formArray['firstname'] = $escapedfirstname;

	$lastname = $_POST['lastname'];
	$escapedlastname = escapeString($dbconn, $lastname);
	$formArray['lastname'] = $escapedlastname;

	$add = $_POST['add'];
	$escapedadd = escapeString($dbconn, $add);
	$formArray['add'] = $escapedadd;

	$email = $_POST['email'];
	$escapedemail = escapeString($dbconn, $email);
	$formArray['email'] = $escapedemail;

	$telno = $_POST['telno'];
	$escapedtelno = escapeString($dbconn, $telno);
	$formArray['telno'] = $escapedtelno;

	$mobino = $_POST['mobino'];
	$escapedmobino = escapeString($dbconn, $mobino);
	$formArray['mobino'] = $escapedmobino;

	$username = $_POST['username'];
	$escapedusername = escapeString($dbconn, $username);
	$formArray['username'] = $escapedusername;

		$pass = $_POST['password'];
		$escapedpass = escapeString($dbconn, $pass);
		$formArray['pass'] = $escapedpass;

		$query = "INSERT INTO users values(NULL,'$escapedusername',SHA('$escapedpass'),'$escapedfirstname','$escapedlastname', '$escapedadd','$escapedtelno' ,'$escapedmobino', '$escapedemail', 'pending')";
		
			// $query="$columnName = '$value',";
		

		
		$result = mysqli_query($dbconn, $query);

		if($result)	redirectuser('register.php?success=true');
		else redirectuser('register.php?success=false');
				
?>