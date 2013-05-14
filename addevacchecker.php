<?php

	session_start();
	include('/includes/database.inc.php');
	include('/includes/functions.inc.php');

	$formArray = array();

	$evacname = $_POST['evacname'];
	$escapedevacname = escapeString($dbconn, $evacname);
	$formArray['evacname'] = $escapedevacname;

	$numstreet = $_POST['numstreet'];
	$escapednumstreet = escapeString($dbconn, $numstreet);
	$formArray['numstreet'] = $escapednumstreet;

	$brgy = $_POST['brgy'];
	$escapedbrgy = escapeString($dbconn, $brgy);
	$formArray['brgy'] = $escapedbrgy;

	$city = $_POST['city'];
	$escapedcity = escapeString($dbconn, $city);
	$formArray['city'] = $escapedcity;

	
	$province = $_POST['province'];
	$escapedprovince = escapeString($dbconn, $province);
	$formArray['province'] = $escapedprovince;

	$long = $_POST['long'];
	

	$lat = $_POST['lat'];
	
	



	$query = "SELECT evacname from evac where longitude = $long and latitude = $lat";
	$result = mysqli_query($dbconn, $query);
	if(!$result) {
		//redire
		redirectuser('addevac.php?success=false1');
	}
	if (mysqli_num_rows($result))
		//redirect 
		redirectuser('addevac.php?error=duplicate');

	$query = "INSERT INTO evac values(NULL,'$escapedevacname','$escapednumstreet', '$escapedbrgy', '$escapedcity','$escapedprovince', $lat , $long)";
	//if($result)
		//$query="$columnName = '$value',";

	
		
	$result = mysqli_query($dbconn, $query);

	if($result)
	{
	$query = "INSERT INTO updates VALUES (NULL, 'add', now(), {$_SESSION['user_id']})";
	$result = mysqli_query($dbconn, $query);
		if($result)
		redirectuser('addevac.php?success=true');
	else redirectuser('addevac.php?success=false');
	}

				
?>

