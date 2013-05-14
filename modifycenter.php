<?php
	session_start();
	include('/includes/functions.inc.php');

	if(isset($_SESSION['user_id'])){ //if logged in
		$page = 'register'; 
		include('/includes/database.inc.php');
		include('/includes/header.inc.php');
		$evacid = $_GET['evacid'];
		$query = "SELECT * FROM evac WHERE idevac = $evacid ";
		$result = @mysqli_query($dbconn, $query);
		if($result){
			if(mysqli_num_rows($result)>=1){
				$evacInfo = mysqli_fetch_array($result, MYSQLI_ASSOC);

			}
		}
		//$query = "update users set username = '$username',WHERE user_id = {$_SESSION['user_id']}";
		//$result = @mysqli_query($dbconn, $query);
		//if($result){
		//	if(mysqli_num_rows($result)>=1){
		//		$userInfo = mysqli_fetch_array($result, MYSQLI_ASSOC);
				
		//	}
		//}
?>
<div id="errormessage" style="display:none;">
</div>
<div id="addevacform">
	 <div id="map_canvas" style = "height: 600px;width: 460px;background-position: right;float:left;background-position:right;background-color:#fff;"></div>

	<form action="modifycenterchecker.php" method="post" id="formbox">
		<div style="font-size:20px !important;padding-bottom:7px;border-bottom:1px solid #aaa;margin-bottom:10px;padding-left:10px">
		<b>Edit Evacuation Center</b>
		</div>
		
		<b>Name of Evacuation Center</b></br>
		<input class="logininput" type="text" placeholder="<?php if(isset($evacInfo)) echo $evacInfo['evacname']; ?>"value="<?php if(isset($evacInfo)) echo $evacInfo['evacname']; ?>" name="evacname" maxlength="75"/><br/>
		<b><u>Address: <br/></u></b>
		<b>No, Street</b></br>
		<input class="logininput" type="text" value="<?php if(isset($evacInfo)) echo $evacInfo['nostreet']; ?>"placeholder="<?php if(isset($evacInfo)) echo $evacInfo['nostreet']; ?>" name="numstreet" maxlength="75"/><br/>
		<b>Barangay</b></br>
		<input class="logininput" type="text" value="<?php if(isset($evacInfo)) echo $evacInfo['barangay']; ?>"placeholder="<?php if(isset($evacInfo)) echo $evacInfo['barangay']; ?>" name="brgy" maxlength="150"/><br/>
		<b>City</b></br>
		<input class="logininput" type="text" value="<?php if(isset($evacInfo)) echo $evacInfo['city']; ?>"placeholder="<?php if(isset($evacInfo)) echo $evacInfo['city']; ?>" name="city" maxlength="150"/><br/>
		<b>Province</b></br>
		<input class="logininput" type="text" value="<?php if(isset($evacInfo)) echo $evacInfo['province']; ?>"placeholder="<?php if(isset($evacInfo)) echo $evacInfo['province']; ?>" name="province" maxlength="75"/><br/>
		<b>Latitude</b></br>
		<input class="logininput" type="text" placeholder="Latitude" id="latitude" name="lat" maxlength="75" readonly="readonly"/><br/>
		<b>Longitude</b></br>
		<input class="logininput" type="text" placeholder="Longitude" id="longitude" name="long" maxlength="75" readonly="readonly"/><br/>
<input type="hidden" value="<?php if(isset($evacInfo)) echo $evacInfo['idevac']; ?>" name="evacid"/>
		<input id="submit" class="button" type="submit" value="Save" onclick= "check()" />
	</form>
<div class="clear"></div>
		</div>


<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBFO1Y2SXmw_MhTnSgcKo6_cVJsWPbygu8&sensor=false"></script>
<script type="text/javascript">
	$(document).ready(initialize);
    function initialize() {
        var coords = new google.maps.LatLng(<?php if(isset($evacInfo)) echo $evacInfo['latitude']; ?>, <?php if(isset($evacInfo)) echo $evacInfo['longitude']; ?>);
        var mapOptions = {
			center: coords,
			zoom: 11,
			mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var firstmap = new google.maps.Map(document.getElementById("map_canvas"),
            mapOptions);

        var image = 'images/smaller.png';
        var marker = new google.maps.Marker({
			position: coords,
			map: firstmap,
			draggable: true,
			icon: image
        });

        document.getElementById("latitude").value = coords.lat();
		document.getElementById("longitude").value = coords.lng();

		google.maps.event.addListener(marker, 'dragend', function(cDnate) {
			console.log(cDnate);
			document.getElementById("latitude").value = cDnate.latLng.lat();
			document.getElementById("longitude").value = cDnate.latLng.lng();
		});

    	}
</script>	
<?php
		echo '<div id="errormessage" style="display:none;"></div>';
		include('/includes/footer.inc.php');
	}
	else redirectuser('loginpage.php');
?>
