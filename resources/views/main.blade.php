<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
	<head>
		@include('partials/_head')
	</head>
		<body>
			<div id="hamburger-container">
				<div id="hamburger">
					<span></span>
					<span></span>
					<span></span>
				</div>
			</div>
			<div id="mySidenav" class="sidenav">
				  <a href="#">About</a>
				  <a href="#">Services</a>
				  <a href="#">Clients</a>
				  <a href="#">Contact</a>
			</div>

			<div id="main">
			  	<div class="container">
					@yield('content')
				</div>
				@include('partials._footer')
			</div>
			
			@include('partials/_scripts')
		</body>
</html>