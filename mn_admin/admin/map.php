<?php
session_start();
include("connect.php");
include("security.php");
if(isset($_REQUEST['logout'])){
	session_destroy();
	header("Location:../");
}
if(isset($_REQUEST['cid'])){
	$_SESSION['agent_id']=$_REQUEST['cid'];
	header("Location:map.php");
}
if(isset($_SESSION['ac_type'],$_SESSION['agent_id'])){
	$type=$_SESSION['ac_type'];
	if($type=="admin"){
		$admin_id=$_SESSION['admin_id'];
		$sel=mysql_query("select * from admin where admin_id='$admin_id'")or die(mysql_error());
		$val=mysql_fetch_array($sel);
		$user_name=$val['name'];
         $username=$val['username'];		
		$agent_id=$_SESSION['agent_id'];
	}
}else{
	echo "<h1 style='color:red'>ACCESS DENIED</h1><a href='../'>BACK</a>";
	return;
}

$message="";
?>



<?php
if(isset($_REQUEST['longitude'],$_REQUEST['latitude'])){
							//var_dump($_POST); return;
							
	  $latitude=clean_data($_REQUEST['latitude']);
	  $longitude=clean_data($_REQUEST['longitude']);
  if($latitude && $longitude){	  
		
	mysql_query("update crane set latitude='$latitude',longitude='$longitude' where crane_id='$agent_id'")or die(mysql_error());
	
		$message = 'Crane Location Updated Successfully';
	
  }else{
		$message = 'Failed to get longitude & latitude.';	
  }
}
						
						
						
?>







<?php
$sel=mysql_query("select * from crane where crane_id='$agent_id'")or die(mysql_error());
$val=mysql_fetch_array($sel);
$longitude=$val['longitude'];
$latitude=$val['latitude'];
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Crane Location</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      .controls {
        margin-top: 10px;
        border: 1px solid transparent;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        height: 32px;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
      }

      #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 300px;
      }

      #pac-input:focus {
        border-color: #4d90fe;
      }

      .pac-container {
        font-family: Roboto;
      }

      #type-selector {
        color: #fff;
        background-color: #4d90fe;
        padding: 5px 11px 0px 11px;
      }

      #type-selector label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
      }
    </style>
  </head>
  <body>
 
    <input id="pac-input" class="controls" type="text"
        placeholder="Enter crane location">
    <div id="type-selector" class="controls">
      <input type="radio" name="type" id="changetype-all" checked="checked">
      <label for="changetype-all">All</label>

      <input type="radio" name="type" id="changetype-establishment">
      <label for="changetype-establishment">Establishments</label>

      <input type="radio" name="type" id="changetype-address">
      <label for="changetype-address">Addresses</label>

      <input type="radio" name="type" id="changetype-geocode">
      <label for="changetype-geocode">Geocodes</label>
    </div>
    <div id="map"></div>

    <script>
	latData="";//latitude
	longData="";//longitude
      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: <?php if($latitude!=0) echo $latitude; else echo "0.351104"; ?>, lng:<?php if($longitude!=0) echo $longitude; else echo "32.5424005"; ?> },
          zoom: 14
        });
        var input = /** @type {!HTMLInputElement} */(
            document.getElementById('pac-input'));

        var types = document.getElementById('type-selector');
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(types);

        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.bindTo('bounds', map);

        var infowindow = new google.maps.InfoWindow();
        var marker = new google.maps.Marker({
          map: map,
          anchorPoint: new google.maps.Point(0, -29)
        });

        autocomplete.addListener('place_changed', function() {
          infowindow.close();
          marker.setVisible(false);
          var place = autocomplete.getPlace();
          if (!place.geometry) {
            // User entered the name of a Place that was not suggested and
            // pressed the Enter key, or the Place Details request failed.
            window.alert("The address: '" + place.name + "' is unknown, please check your spelling.");
            return;
          }else{
		  //load my cordinates from here
		  //locationData=place.geometry.location;
		  latData= place.geometry.location.lat();
          longData = place.geometry.location.lng(); 
		  document.getElementById("latView").value=latData;
		  document.getElementById("longView").value=longData;
		  //window.alert("Latitude: "+latData+" Long: "+longData); 
		  
		  }

          // If the place has a geometry, then present it on a map.
          if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
          } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);  // Why 17? Because it looks good.
          }
          marker.setIcon(/** @type {google.maps.Icon} */({
            url: place.icon,
            size: new google.maps.Size(71, 71),
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(17, 34),
            scaledSize: new google.maps.Size(35, 35)
          }));
          marker.setPosition(place.geometry.location);
          marker.setVisible(true);

          var address = '';
          if (place.address_components) {
            address = [
              (place.address_components[0] && place.address_components[0].short_name || ''),
              (place.address_components[1] && place.address_components[1].short_name || ''),
              (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
          }

          infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
          infowindow.open(map, marker);
        });

        // Sets a listener on a radio button to change the filter type on Places
        // Autocomplete.
        function setupClickListener(id, types) {
          var radioButton = document.getElementById(id);
          radioButton.addEventListener('click', function() {
            autocomplete.setTypes(types);
          });
        }

        setupClickListener('changetype-all', []);
        setupClickListener('changetype-address', ['address']);
        setupClickListener('changetype-establishment', ['establishment']);
        setupClickListener('changetype-geocode', ['geocode']);
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC6bKy6lRbOaN5DXvPxJzpYdqmbTCOShYQ&libraries=places&callback=initMap"
        async defer></script>
		 <div style="position:fixed;left:30px;bottom:30px;padding:20px;">
		 
  <form id="newLocation" method="post" action="">
  <input type="hidden" name="latitude" id="latView" />
  <input type="hidden" name="longitude" id="longView" />
  <input type="button" style="background-color:#990099;border:none;color:#f7f7f7;font-size:large;padding:10px" value="Save Location" onClick="submitLocation()" />
  <?php if($message!=""){ ?>
  <p><b style="background-color:#CC0000;border:1px solid:#CCCCCC;color:#ffffff;padding:10px; border-radius:5px;margin:5px"><?php echo $message; ?></b></p>
  <?php } ?>
  </form>
   <hr style="border:none;border-top:1px solid #990099"/>
  <a href="<?php if($_SESSION['prev_page'] == "new_crane.php") echo "registered_crane.php?aid=".$_SESSION['account_id']; else echo $_SESSION['prev_page']; ?>"><input type="button" style="background-color:#333333;border:none;color:#f7f7f7;font-size:large;padding:10px" value="Back" /></a>
		
  <script type="text/javascript">
  function submitLocation(){
    if(latData!="" && longData!=""){
	document.getElementById("newLocation").submit();
	}else{
	alert("Please enter the crane location in the field above!");
	}
  }
  </script>
  </div>
  </body>
</html>