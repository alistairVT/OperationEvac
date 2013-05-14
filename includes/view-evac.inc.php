
<!DOCTYPE html>
<html>
<div id = "map" style = "position:relative; z-index:1;">
  <?php

  if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
  /*DEFINE('USER', 'root');
  DEFINE('PASSWORD', 'asanamanyourface');
  DEFINE('DATABASE', 'evacfinder');
  DEFINE('HOST', 'localhost');*/

  $dbconn = mysqli_connect('localhost', 'root', 'asanamanyourface', 'evacfinder');
  mysqli_set_charset($dbconn, 'utf8');
  
  $query = mysql_query("select * from 'evac'");
          $rowArray = array();

        $result = mysqli_query($dbconn, $query);

        if($result && mysqli_num_rows($result)){
          while($row = mysqli_fetch_assoc($result)){
            $rowArray[] = $row;
          }
        }
?>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
</style>
    <script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBFO1Y2SXmw_MhTnSgcKo6_cVJsWPbygu8&sensor=false">
    </script>
    <script type="text/javascript">
      function initialize() {
        var coords = new google.maps.LatLng(14.6172901, 121.05930869);
        var mapOptions = {
          center: coords,
          zoom: 11,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var firstmap = new google.maps.Map(document.getElementById("map_canvas"),
            mapOptions);

        
        /*var marker = new google.maps.Marker({
              position: coords,
              map: firstmap,
              title:"Kubili Court"
          });

        var contentString = '<div id="content">'+
    '<div id="siteNotice">'+
    '</div>'+
    '<font color = "black"><h2 id="firstHeading" class="firstHeading">Kubili Court</h2>'+
    '<div id="bodyContent">'+
    '<b>Building Type:</b> covered court<br>' +
    '<b>Capacity: </b>150 families<br>'+
    '<b>Address: </b> Kubili St. Quirino-A Quezon City<br>'+
    '<b>Status: </b></font><font color="green">Empty</font>'+
    '</div>'+
    '</div>';
      var infowindow = new google.maps.InfoWindow({
      content: contentString
      });

      google.maps.event.addListener(marker, 'click', function() {
  infowindow.open(map,marker);
});*/
        var contentString = '<div id="content">'+
    '<div id="siteNotice">'+
    '</div>';

        <?php
            foreach($rowArray as $marker)
            {
        ?>
        var myLatlng = new google.maps.LatLng(<?php echo $marker['latitude']?>,<?php echo $marker['longitude'] ?>);
        contentString += <?php echo $marker['evacname'] ?>;
        contentString += '<br>';
        contentString += <?php echo $marker['numstreet'] ?> + ' ' + <?php echo $marker['brgy'] ?> + ' ' + <?php echo $marker['city'] ?> + ' ' + <?php echo $marker['province'] ?> +  '</div>'+ '</div>';
        var image = 'smaller.png';
        var marker_<?php echo $marker['id']; ?> = new google.maps.Marker({
          position myLatlng,
          map: firstmap,
          descrip: contentString,
          icon: image
        });

        var infowindow = new google.maps.InfoWindow({
      content: contentString
      });

      google.maps.event.addListener(marker_<?php echo $marker['id']; ?>, 'click', function() {
  infowindow.open(map,mmarker_<?php echo $marker['id']; ?>);}

  <?php } ?>

      }
    </script>
  </head>

  <body onload="initialize()">
    <div id="map_canvas" style = "height: 600px; width: 700px; background-position:right;"></div>

    
    
  </body>
  </div>
</html>