<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'Laravel') }}</title>

<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="{{ asset('css/bootstrap-form-helpers.min.css') }}" rel="stylesheet">

<!-- Favicon -->
<link rel="apple-touch-icon" sizes="180x180" href="{{asset('favicons/apple-touch-icon.png')}}">
<link rel="icon" type="image/png" sizes="32x32" href="{{asset('favicons/favicon-32x32.png')}}">
{{-- <link rel="icon" type="image/png" sizes="16x16" href="{{asset('favicons/favicon-16x16.png')}}"> --}}
<link rel="manifest" href="{{asset('favicons/manifest.json')}}">
<link rel="mask-icon" href="{{asset('favicons/safari-pinned-tab.svg')}}" color="#5bbad5">
<meta name="theme-color" content="#ffffff">

<!-- Scripts -->
<script src="https://use.fontawesome.com/e3d24e6b06.js"></script>
{{-- <script>
    window.Laravel = {!! json_encode([
        'csrfToken' => csrf_token(),
    ]) !!};
</script> --}}