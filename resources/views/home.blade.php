@extends('layouts.master')

@section('title', 'Home')

@section('javascript_header')
<script type="text/javascript" src="{{asset('js/leaflet.js')}}"></script>
@endsection

@section('page_css')
<link rel="stylesheet" type="text/css" href="{{asset('css/leaflet.css')}}">
@endsection

@section('content')
<div class="grid-2-1">
	<div class="grid-2-1-1">
		<h1>Hi, here's a simple randomizer to help you decide where to eat.</h1>
	</div>
	<div class="grid-2-1-2">
		<input type="range" id="input_distance" min="100" max="5000" value="100">
		<h2>Max Distance: <span id="current_distance">100</span>m near you</h2>
	</div>
	<div class="grid-2-1-3">
		<div id="map"></div>
	</div>
	<div class="grid-2-1-4">
		<button>Saan tayo kakain?</button>
	</div>
	
</div>
@endsection

@section('javascript_footer')
<script type="text/javascript">

	
	var circle_distance;
	var current_location;

	var mymap = L.map('map').locate({setView: true, maxZoom: 13}).on('locationfound', function(e){

		var marker = L.marker([e.latitude, e.longitude]).bindPopup('Your are here').addTo(mymap);
        circle_distance = L.circle([e.latitude, e.longitude], {
		    color: 'red',
		    fillColor: '#f03',
		    fillOpacity: 0.5,
		    radius: 100
		}).addTo(mymap);
		mymap.setView([e.latitude, e.longitude], 17);
		current_location = [e.latitude, e.longitude];
	});


	L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 20,
    id: 'mapbox.streets',
    accessToken: 'pk.eyJ1IjoiYW5kenJvIiwiYSI6ImNpc2N6YWU1aTAwMnUyeW52bWk4ajNidXAifQ.Et_VOMZDiuYZMiHHilgosA'
	}).addTo(mymap);

	console.log(mymap.getZoom());

	$('#input_distance').on("input", function(e) {
	  $("#current_distance").text( $(e.target).val());
	  mymap.removeLayer(circle_distance);
	  circle_distance = L.circle(current_location, {
		    color: 'red',
		    fillColor: '#f03',
		    fillOpacity: 0.5,
		    radius: $(e.target).val()
		}).addTo(mymap);
	});

</script>
@endsection