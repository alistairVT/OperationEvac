<?php
	session_start();
	include('/includes/database.inc.php');
	include('/includes/header.inc.php');
?>
<div class="messageheader">
	Evacuation Centers
	</div>
	<div id="pop-bg" style="display:none;"></div>
		<div id="pop-map" style="display:none;">
			<div id="pop-exit">X</div>
			<div id="pop-evacname"></div>
			<div id="map_canvas" style = "background-color:#fff;height: 500px;width: 600px;background-position: right;background-position:right;"></div>
		</div>	
<font color = "black">
<?php
	$query="SELECT * FROM evac";
				$result=mysqli_query($dbconn, $query);
				if($result){
					if(mysqli_num_rows($result)){
						echo '<table id="centerlist">';
						echo '<tr><td><b>Evacuation Center</b></td>';
						if(isset($_SESSION ['user_id']))
							echo '<td><b>Modify</b> </td><td><b>Delete</b></td></tr>';
						while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
							echo '<tr>';
							echo '<td><a class="evacname" style="cursor:pointer;" id="'.$row['idevac'].'">'.$row['evacname'].'</a></td>';
						   if(isset($_SESSION ['user_id']))
							{echo '<td><a href="modifycenter.php?evacid='.$row['idevac'].'">Modify</a></td>';
							echo '<td><a href="deletecenter.php?evacid='.$row['idevac'].'">Delete</a></td>';
							}
							echo '</tr>';
						}
						echo '</table>';
					}
				}

?></font>


<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBFO1Y2SXmw_MhTnSgcKo6_cVJsWPbygu8&sensor=false"></script>



<script type="text/javascript">
	var serverRequest = null;
	var popUp = $("#pop-map");
	var popBG = $("#pop-bg");
	var popEvacName = $("#pop-evacname");
	var popExit = $("#pop-exit");
	var firstmap = null;
	var marker = null;
	$(window).resize(positionBox);
	//$(window).keypress(checkKey);

	$(popBG).click(closePopBoxes);
	$(popExit).click(closePopBoxes);

	$(".evacname").click(getDataFromDB);

	/*function checkKey(event){
		if(event.keyCode == 32)
			closePopBoxes();
	}*/

	function positionBox(){
		var divHeight = parseInt($(popUp).css('height'));
		var divWidth = parseInt($(popUp).css('width')); 
		var topDistance = (window.innerHeight/2) - (divHeight+20)/2;
		var leftDistance = (window.innerWidth/2) - (divWidth+20)/2;
		topDistance += 25;
		$(popUp).css({'top':topDistance+'px', 'left':leftDistance+'px'});

	}

	function getDataFromDB(event){
		var evacID = $(this).attr('id');
		
		if(serverRequest != null){
			serverRequest.abort();
			serverRequest = null;
		}
			

		serverRequest = $.getJSON("ajax/getlonglat.php", {'evacid':evacID}, showInMap);

	}

	function showInMap(data, textStatus){
		if(textStatus == 'success'){
			if(data['error'] == 'false'){
				$(popBG).fadeIn();
				positionBox();
				var coords = new google.maps.LatLng(data['latitude'], data['longitude']);
			    
			    if(firstmap == null){
			    	var mapOptions = {
				      center: coords,
				      zoom: 11,
				      mapTypeId: google.maps.MapTypeId.ROADMAP
				    };
					firstmap = new google.maps.Map(document.getElementById("map_canvas"),
			        mapOptions);
				    var image = 'images/smaller.png';
			   		marker = new google.maps.Marker({
			          position: coords,
			          map: firstmap,
			          draggable: false,
			          icon: image
			      	});
				}
				else{
					firstmap.setCenter(coords);
					marker.setPosition(coords);
				}

				$(popEvacName).html(data['name']);
				$(popEvacName).append('<div id="pop-address"><i>'+data['address']+'</i></div>');
				$(popUp).fadeIn();
			}
		}
		
	}

    /*function initialize() {
        

    }*/

    function closePopBoxes(){
    	$(popUp).fadeOut();
    	$(popBG).fadeOut();
    }
</script>
<?php
	include('/includes/footer.inc.php');
?>	