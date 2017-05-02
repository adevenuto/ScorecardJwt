<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
	<head>
		@include('partials/_head')
	</head>
		<body>
			@include('partials/_nav')
			<div class="container">
				@yield('content')
			</div>
			
				@include('partials._footer')
			
			@include('partials/_scripts')
		</body>
</html>