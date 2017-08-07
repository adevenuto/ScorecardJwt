<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
	<head>
		@include('partials/_head')
	</head>
		<body>
			@include('partials/_nav')

			<div id="main">
				<div class="container-fluid">
					@include('partials/_notifications')
				</div> 
			  	<div class="container">
					@yield('content')
				</div>
				@include('partials._footer')
			</div>{{-- main end --}}
			@include('partials/_scripts')
			@yield('courses.create')
		</body>
</html>