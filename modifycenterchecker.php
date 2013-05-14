<?php
	session_start();
	include('/includes/database.inc.php');
	include('/includes/functions.inc.php');

	$evacname = $_POST['evacname'];
	$escapedEvacname = escapeString($dbconn, $evacname);
	
	$nostreet = $_POST['numstreet'];
	$escapedNostreet = escapeString($dbconn, $nostreet);
	
	$barangay = $_POST['brgy'];
	$escapedBarangay = escapeString($dbconn, $barangay);

	$city = $_POST['city'];
	$escapedCity = escapeString($dbconn, $city);


	$lat = $_POST['lat'];

	$long = $_POST['long'];	


	$evacid = $_POST['evacid'];

	if(!empty($_POST['province'])){
		$province = $_POST['province'];
		$escapedProvince = escapeString($dbconn, $province);
	}

	$query = "UPDATE evac SET evacname = '$escapedEvacname' , nostreet = '$escapedNostreet', barangay  = '$escapedBarangay', city = '$escapedCity', province = '$escapedProvince' , latitude = '$lat', longitude = '$long' WHERE idevac = $evacid";

	$result = mysqli_query($dbconn, $query);
	if($result){	
		redirectuser('modifycenter.php?success=true&evacid='.$evacid);

	}
	redirectuser('modifycenter.php?success=false&evacid='.$evacid);

?>