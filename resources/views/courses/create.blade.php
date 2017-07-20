@extends('main')
@section('content')
	<h1>Create a course</h1>
	<div class="container">
		<div class="row">
			<form>
			  <div class="form-group">
			    <input type="text" class="form-control" id="course_name" placeholder="Course Name">
			  </div>
			  <div class="form-group">
			    <input type="text" class="form-control" id="course_address" placeholder="Address">
			  </div>
			  <div class="form-group">
			    <input type="text" class="form-control bfh-phone" data-format="+1 (ddd) ddd-dddd">
			  </div>
			  <div class="form-group">
			    <input type="email" class="form-control" id="course_email" placeholder="Email" required>
			  </div>
			</form>
		</div>
	</div>
@endsection