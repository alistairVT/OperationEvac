<?php
	include('../includes/database.inc.php');

	$evacID = $_GET['evacid'];
	$rawData = array();
	$query = "SELECT * FROM evac WHERE idevac = $evacID";

	$result = mysqli_query($dbconn, $query);

	if($result){
		$evacDetails = mysqli_fetch_array($result, MYSQLI_ASSOC);
		$rawData['name'] = $evacDetails['evacname'];
		$address = array();
		$address[] = $evacDetails['nostreet'];
		$address[] = $evacDetails['barangay'];
		$address[] = $evacDetails['city'];
		if(!empty($evacDetails['province']))
			$address[] = $evacDetails['province'];

		$completeAddress = implode($address, ', ');

		$rawData['longitude'] = $evacDetails['longitude'];
		$rawData['latitude'] = $evacDetails['latitude'];
		$rawData['error'] = 'false';
		$rawData['address'] = $completeAddress;
		$rawData = json_encode($rawData, JSON_FORCE_OBJECT);
	}
	else{
		$rawData['error'] = 'true';
		$rawData = json_encode($rawData, JSON_FORCE_OBJECT);
	}

	echo $rawData;
?>