<?php
	session_start();
	
	include('/includes/database.inc.php');
	include('/includes/header.inc.php');
	include('/includes/functions.inc.php');
	
if(isset($_SESSION ['user_id']))
{

?>

	
	
<script type = "text/javascript">
function evacchecker()
	{
	 
		var name = document.forms["formbox"]["evacname"].value;
		var street = document.forms["formbox"]["numstreet"].value;
		var brgy = document.forms["formbox"]["brgy"].value;
		var city = document.forms["formbox"]["city"].value;
		var errorbox=document.getElementById("errormessage");

		var error = false;

		if(name == null || name == "")
		{
			document.forms["formbox"]["evacname"].style.borderColor = "red";
			document.forms["formbox"]["evacname"].style.backgroundColor = "#E799A3";
			error = true;
		}
		if(street == null || street == "")
		{
			document.forms["formbox"]["numstreet"].style.borderColor = "red";
			document.forms["formbox"]["numstreet"].style.backgroundColor = "#E799A3";
			error = true;
		}
		if(brgy == null || brgy == "")
		{
			document.forms["formbox"]["brgy"].style.borderColor = "red";
			document.forms["formbox"]["brgy"].style.backgroundColor = "#E799A3";
			error = true;
		}
		if(city == null || city == "")
		{
			document.forms["formbox"]["city"].style.borderColor = "red";
			document.forms["formbox"]["city"].style.backgroundColor = "#E799A3";
			error = true;
		}
		if(Latitude == null || Latitude == "")
		{
			document.forms["formbox"]["Latitude"].style.borderColor = "red";
			document.forms["formbox"]["Latitude"].style.backgroundColor = "#E799A3";
			error = true;
		}
		if(Longitude == null || Longitude == "")
		{
			document.forms["formbox"]["Longitude"].style.borderColor = "red";
			document.forms["formbox"]["Longitude"].style.backgroundColor = "#E799A3";
			error = true;
		}
		if(error)
		{
		    errorbox.innerHTML="Error sending form. Edit those in red.";
		    errorbox.style.display="block";
			error="";
			
			event.preventDefault();
			return false;
		}
	}
	window.onload = showNotif;

	function showNotif(){
		if(location.search.indexOf("success=true") > -1)
			alert("EVAC ADDED");
		else if(location.search.indexOf("success=false") > -1)
			alert("System error!");
		else if(location.search.indexOf("error=duplicate") > -1)
			alert("EVACUATION EXISTS!");
	}
</script>

   
<div id="errormessage" style="display:none;">
</div>
<div id="addevacform">
	 <div id="map_canvas" style = "height: 600px;width: 460px;background-position: right;float:left;background-position:right;background-color:#fff;"></div>
		
	<form action="addevacchecker.php" method="post" id="formbox" >
		<div style="font-size:20px !important;padding-bottom:7px;border-bottom:1px solid #aaa;margin-bottom:10px;">
		<b>Add Evacuation Center</b>
		</div>
		
		<b>Name of Evacuation Center</b></br>
		<input class="logininput" type="text" placeholder="Evac Name" name="evacname" maxlength="75"/><br/>
		<b><u>Address: <br/></u></b>
		<b>No, Street</b></br>
		<input class="logininput" type="text" placeholder="No Street" name="numstreet" maxlength="75"/><br/>
		<b>Barangay</b></br>
		<input class="logininput" type="text" placeholder="Barangay" name="brgy" maxlength="150"/><br/>
		<b>City</b></br>
		<input class="logininput" type="text" placeholder="City" name="city" maxlength="150"/><br/>
		<b>Province</b></br>
		<input class="logininput" type="text" placeholder="Province" name="province" maxlength="75"/><br/>
		<b>Latitude</b></br>
		<input class="logininput" type="text" placeholder="Latitude" id="latitude" name="lat" maxlength="75" readonly="readonly"/><br/>
		<b>Longitude</b></br>
		<input class="logininput" type="text" placeholder="Longitude" id="longitude" name="long" maxlength="75" readonly="readonly"/><br/>

		<input id="submit" class="button" type="submit" value="Add Evacuation Center" onclick="javascript:return evacchecker(event)"/>
	
	</form>	
	<div class="clear"></div>
		</div>


<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBFO1Y2SXmw_MhTnSgcKo6_cVJsWPbygu8&sensor=false"></script>
<script type="text/javascript">
	$(document).ready(initialize);
    function initialize() {
        var coords = new google.maps.LatLng(14.62194099701922, 121.05862204449215);
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
	include('/includes/footer.inc.php');
	}
else redirectuser('loginpage.php');
?>