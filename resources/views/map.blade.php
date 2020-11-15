<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>maps :)</title>
	<style>
        #mapid {
            height: 80vh;
        }

        .visible {
            visibility: visible;
        }

        .hidden {
            visibility: hidden;
        }
    </style>
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
		integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
		crossorigin="" />
	<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
		integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
		crossorigin=""></script>
</head>

<body>
	<h1>maps :)</h1>
	<div>navigation and proper title will go here. double click to add a marker, click to see details</div>
	<div id="mapid"></div>
	<div id="markerdetail" class="hidden"></div>

	<script>
		//vars
		var mymap = L.map('mapid').setView([51.505, -0.09], 13);
		var marker = L.marker([51.5, -0.09]).addTo(mymap);
		var popup = L.popup();

		//handler functions
		function onMapDblClick(e) {
			var marker = L.marker(e.latlng)
			marker.addTo(mymap);
			marker.bindPopup("<b>Input details for this location</b>").openPopup();
			//TODO: allow user to enter details about this location
			//TODO: to add to database
		}

		//setup
		L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
			attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
			maxZoom: 18,
			id: 'mapbox/streets-v11',
			tileSize: 512,
			zoomOffset: -1,
			accessToken: 'pk.eyJ1IjoiY2xhcmVidWNrbGV5IiwiYSI6ImNraGppazYxaTE3bWkyeG85bmdvcDZwaGYifQ.JoguXXtAALGJXa_yJ_aO_A'
		}).addTo(mymap);

		//TODO: need to change this popup to show details about the location
		marker.bindPopup("<b>Hello world!</b><br>I am a popup.").openPopup();

		mymap.on('dblclick', onMapDblClick);

	</script>
</body>
</html>
