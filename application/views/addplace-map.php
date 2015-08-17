<?php
/*
 * @file add-to-map.php
 * @author Stefan Jonker (programmer at stefanjonker dot nl)
 * @date 04-08-2015
 *
 * Created: Tue 04-08-2015, 18:30:14 (:-0500)
 * Last modified: Fri 14-08-2015, 16:47:19 (-0500)
 */
?>

<div id="map-canvas"></div>

	<!-- <script src="https://maps.googleapis.com/maps/api/js?key="></script> -->
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>
	<script>
	var map;
	var markers = [];
	
	function initialize() {
		if(document.querySelector('#latitude').value.length === 0
		&& document.querySelector('#longitude').value.length === 0) {
			var location = new google.maps.LatLng(25.6488126, -100.3030789);
		} else { 
			var location = 
				new google.maps.LatLng(
					document.querySelector('#latitude').value, 
					document.querySelector('#longitude').value);
		}

		var mapOptions = {
			zoom: 15,
			center: location,
			mapTypeId: google.maps.MapTypeId.TERRAIN,
		};
	
		map = new google.maps.Map(document.getElementById('map-canvas'),
		mapOptions);
		
		google.maps.event.addListener(map, 'click', function(event) {
			var lat = event.latLng.lat();
			var lng = event.latLng.lng();
	
			document.querySelector('#latitude').value = lat;
			document.querySelector('#longitude').value = lng;

			addMarker(event.latLng);
		});
	
		addMarker(location);
	}
	
	function addMarker(location) {
		deleteMarkers();
	
		var marker = new google.maps.Marker({
			position: location,
			map: map
		});

		markers.push(marker);
	}
	
	function setAllMap(map) {
		for (var i = 0; i < markers.length; i++) {
			markers[i].setMap(map);
		}
	}
	
	function clearMarkers() {
		setAllMap(null);
	}
	
	function showMarkers() {
		setAllMap(map);
	}
	
	function deleteMarkers() {
		clearMarkers();
		markers = [];
	}

	function resize() {
		var center = map.getCenter();
		google.maps.event.trigger(map, "resize");
		map.setCenter(center); 
	}

	google.maps.event.addDomListener(window, 'load', function () {
		resize();
		initialize();
	});

	google.maps.event.addDomListener(window, "resize", function() {
		resize();
	});
</script>
