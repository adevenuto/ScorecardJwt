<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
	<head>
		@include('partials/_head')
	</head>
	<body>
		<div id="app">
			<app-main><app-main/>
		</div>	
		@include('partials/_scripts')	
		@if (getenv('APP_ENV') === 'local')
		    <script id="__bs_script__">
		        document.write("<script async src='http://HOST:3000/browser-sync/browser-sync-client.js?v=2.18.12'><\/script>".replace("HOST", location.hostname));
		    </script>
		@endif
	</body>
</html>