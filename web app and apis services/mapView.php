<?php include_once 'controllers/Restaurant.php';
$restaurantObj = new Restaurant();
$row = $restaurantObj->getRestaurantDetail(base64_decode($_GET['restaurant_id']));
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<title>Google Maps JavaScript API v3 Example: Marker Simple</title>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
  function initialize() {
    var myLatlng = new google.maps.LatLng(<?php echo $row->latitude; ?>,<?php echo $row->langitude; ?>);
    var myOptions = {
      zoom: 15,
      center: myLatlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
    
    var marker = new google.maps.Marker({
        position: myLatlng, 
        map: map,
        clickable: true
    });
    marker.info = new google.maps.InfoWindow({
  	  content: '<b><?php echo $row->restaurant_name; ?>:</b> <?php echo $row->user_address; ?>'
  	});

  	google.maps.event.addListener(marker, 'click', function() {
  	  marker.info.open(map, marker);
  	});
    
  }
</script>
</head>
<body onload="initialize()">
<div id="map_canvas" style="height:500px;"></div>

</body>

</html>

