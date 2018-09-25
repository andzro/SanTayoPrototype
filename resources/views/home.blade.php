@extends('layouts.master')

@section('title', 'Home')

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
		<button>Saan tayo kakain?</button>
	</div>
	
</div>
@endsection

@section('javascript_footer')
<script type="text/javascript">
	$('#input_distance').on("input", function(e) {
	  $("#current_distance").text( $(e.target).val());
	});
</script>
@endsection