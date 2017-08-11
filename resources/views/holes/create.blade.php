@extends('main')
{{-- @section('courses.create')
	<script src="{{ asset('js/validate.js') }}"></script>
	<script src="{{ asset('js/bootstrap-formhelpers.min.js') }}"></script>
@endsection --}}
@section('content')
	<h1>Holes Create</h1>
	{{$course->id}}
	{{$course->course_name}}
	{{$course->course_address}}
	{{$course->course_postal_code}}
	{{$course->caddies}}
@endsection