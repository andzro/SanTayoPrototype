<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>San Tayo - @yield('title', 'Page')</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
	<link rel="icon" href="{{asset('img/santayo_logo.png')}}">
	<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
	@yield('javascript_header')
	@yield('page_css')
</head>
<body>
<div class="grid-container">
	<div class="grid-1 header">
		@include('layouts.header')
	</div>

	<div class="grid-2 content">
		@yield('content')
	</div>

	<div class="grid-3 footer">
		@include('layouts.footer')
	</div>


</div>
@yield('javascript_footer')
</body>
</html>