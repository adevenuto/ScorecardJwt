<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
	<head>
		@include('partials/_head')
	</head>
		<body>
			<div id="overlay"></div>
				<div id="hamburger">
					<span></span>
					<span></span>
					<span></span>
				</div>
				<div id="mySidenav" class="sidenav">
					<a href="#">About</a>
					<a href="#">Services</a>
					<a href="#">Clients</a>
					<a href="#">Contact</a>
					<hr>
					<div id="auth">
						@if (Auth::guest())
		                    <a href="{{ route('login') }}">Login</a>
		                    <a href="{{ route('register') }}">Register</a>
		                @else
	                        <a class="logout" href="{{ route('logout') }}"
	                            onclick="event.preventDefault();
	                                     document.getElementById('logout-form').submit();">
	                            Logout
	                        </a>
	                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
	                            {{ csrf_field() }}
	                        </form>
		                @endif
					</div>
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