@extends('main')
@section('courses.create')
	<script src="{{ asset('js/bootstrap-formhelpers.min.js') }}"></script>
@endsection
@section('content')
	<div class="container">
		<div class="row">
			<form id="create-course-form" action="/course/create" method="POST">
				{{ csrf_field() }}
				<div class="col-md-8 col-md-offset-2">
					<div class="col-md-12">
						<h1 class="caps">Create a course</h1>
						<small><span class="asterik">*</span> Please fill out the information as accurately as possible. This only has to be done once and the the course will be saved in our database for you and others to play.</small>
						<hr>
					</div>                      
					{{-- General Info --}}
					<div class="col-sm-6">
						<label for="course_name" class="col-2 col-form-label">Name</label>
						<div class="form-group">
							<input type="text" class="form-control" id="course_name" name="course_name" data-msg="Pleases add course name">
						</div>
						<label for="course_address" class="col-2 col-form-label">Address</label>
						<div class="form-group">
							<input type="text" class="form-control" id="course_address" name="course_address" data-msg="Pleases add course address">
						</div>
						<label for="course_phone_number" class="col-2 col-form-label">Phone Number</label>
						<div class="form-group">
							<input type="text" class="form-control bfh-phone" name="course_phone_number" data-format="+1 (ddd) ddd-dddd">
						</div>
						<label for="course_postal_code" class="col-2 col-form-label">Zip Code</label>
						<div class="form-group">
							<input type="text" class="form-control num-only" maxLength="14" id="course_postal_code" name="course_postal_code" data-msg="Pleases add course zipcode">
						</div>

						<label for="course_country" class="col-2 col-form-label">Country</label>
						<div class="form-group">
							<input name="course_country" class="form-control">
						</div>
						<label for="course_state" class="col-2 col-form-label">State</label>
						<div class="form-group">
							<input name="course_state" class="form-control">
						</div>
						<label for="course_city" class="col-2 col-form-label">City</label>
						<div class="form-group">
							<input name="course_city" class="form-control">
						</div>
					</div>
					<div class="col-sm-6">
						<label for="course_email" class="col-2 col-form-label">Email</label>
						<div class="form-group">
							<input type="email" class="form-control" id="course_email" name="course_email">
						</div>
						<label for="course_website" class="col-2 col-form-label">Website</label>
						<div class="form-group">
							<input type="text" class="form-control" id="course_website" name="course_website">
						</div>
						<div class="form-group">
							<label for="course_price" class="col-2 col-form-label">Price</label>
							<select class="custom-select form-group form-control required" name="course_price" data-msg="Please select a price">
								<option selected value="">Select a price</option>
								<option value="$">$</option>
								<option value="$$">$$</option>
								<option value="$$$">$$$</option>
								<option value="$$$$">$$$$</option>
							</select>
						</div>
						<label for="course_holes" class="col-2 col-form-label">Number of holes</label>
						<div class="form-group">
							<div class="radio">
							  	<label><input type="radio" value="9" name="course_holes" checked>9 holes</label>
							</div>
							<div class="radio">
							  	<label><input type="radio" value="18" name="course_holes">18 holes</label>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<button type="submit" class="btn btn-block btn-success b-rad3 create-course-submit">Create Course</button>
					</div>
				</div>
			</form>
		</div>
	</div>
@endsection