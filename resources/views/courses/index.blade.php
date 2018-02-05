@extends('main')
@section('content')

	<h1>Courses page:</h1>
	@foreach($courses as $course)
		<h3>{{$course->course_name}}</h3>
		<p>{{$course->course_address}}</p>
	@endforeach
	{{$uuid}}
@endsection