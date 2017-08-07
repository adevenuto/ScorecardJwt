@extends('main')
@section('courses.create')
	<script src="{{ asset('js/validate.js') }}"></script>
	<script src="{{ asset('js/bootstrap-formhelpers.min.js') }}"></script>
@endsection
@section('content')
	<div class="col-md-12">
		<h1 class="caps">Create a course</h1>
	</div>
	<div class="container">
		<div class="row">
			<form id="courseCreation" action="/course/create" method="POST">
			{{ csrf_field() }}
				<div class="col-sm-4">
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
					<label for="course_email" class="col-2 col-form-label">Email</label>
					<div class="form-group">
						<input type="email" class="form-control" id="course_email" name="course_email">
					</div>
					<label for="course_country" class="col-2 col-form-label">Country</label>
					<div class="form-group">
						<select name="course_country" class="form-control countries" id="cityId" data-msg="Pleases select a country">
							<option value="">Select Country</option>
						</select>
					</div>
					<label for="course_state" class="col-2 col-form-label">State</label>
					<div class="form-group">
						<select name="course_state" class="form-control states" id="stateId" data-msg="Pleases select a state">
							<option value="">Select State</option>
						</select>
					</div>
					<label for="course_city" class="col-2 col-form-label">City</label>
					<div class="form-group">
						<select name="course_city" class="form-control cities" id="cityId" data-msg="Pleases select a city">
							<option value="">Select City</option>
						</select>
					</div>
				</div>
				<div class="col-sm-4">
					{{-- <label for="tournament_tee_length" class="col-2 col-form-label">Tournament Tee Length</label>
					<div class="form-group">
						<input type="text" maxlength="4" class="form-control" id="tournament_tee_length" name="tournament_tee_length" placeholder="Enter Yards">
					</div>
					<label for="back_tee_length" class="col-2 col-form-label">Back Tee Length</label>
					<div class="form-group">
						<input type="text" maxlength="4" class="form-control" id="back_tee_length" name="back_tee_length" placeholder="Enter Yards">
					</div>
					<label for="middle_tee_length" class="col-2 col-form-label">Middle Tee Length</label>
					<div class="form-group">
						<input type="text" maxlength="4" class="form-control" id="middle_tee_length" name="middle_tee_length" placeholder="Enter Yards">
					</div>
					<label for="front_tee_length" class="col-2 col-form-label">Front Tee Length</label>
					<div class="form-group">
						<input type="text" maxlength="4" class="form-control" id="front_tee_length" name="front_tee_length" placeholder="Enter Yards">
					</div> --}}
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
					<div class="form-group">
						<label for="course_holes" class="col-2 col-form-label">Number Of Holes</label>
						<select class="custom-select form-group form-control required" id="course_holes" name="course_holes" data-msg="Pleases select number of holes">
							<option selected value="">Choose an option</option>
							<option value="9">9</option>
							<option value="18">18</option>
							<option value="27">27</option>
							<option value="36">36</option>
						</select>
					</div>
					<div class="form-group">
						<label for="course_holes" class="col-2 col-form-label">Select A Tee Box</label>
						<select class="custom-select form-group form-control required" id="tee-box" data-msg="Pleases select a tee-box">
							<option selected value="">Choose an option</option>
							<option value="gold_tee_length">Gold Tees</option>
							<option value="blue_tee_length">Blue Tees</option>
							<option value="white_tee_length">White Tees</option>
							<option value="red_tee_length">Red Tees</option>
						</select>
					</div>
					<div class="form-check">
					  <label class="form-check-label">
					    <input class="form-check-input" name="driving_range" type="checkbox" value="1">
					    Driving Range
					  </label>
					</div>
					<div class="form-check">
					  <label class="form-check-label">
					    <input class="form-check-input" name="chipping_green" type="checkbox" value="1">
					    Chipping Green
					  </label>
					</div>
					<div class="form-check">
					  <label class="form-check-label">
					    <input class="form-check-input" name="putting_green" type="checkbox" value="1">
					    Putting Green
					  </label>
					</div>
					<div class="form-check">
					  <label class="form-check-label">
					    <input class="form-check-input" name="practice_bunker" type="checkbox" value="1">
					    Practice Bunker
					  </label>
					</div>
					<div class="form-check">
					  <label class="form-check-label">
					    <input class="form-check-input" name="pull_carts" type="checkbox" value="1">
					    Pull Carts
					  </label>
					</div>
					<div class="form-check">
					  <label class="form-check-label">
					    <input class="form-check-input" name="motorized_carts" type="checkbox" value="1">
					    Motorized Carts
					  </label>
					</div>
					<div class="form-check">
					  <label class="form-check-label">
					    <input class="form-check-input" name="pro_shop" type="checkbox" value="1">
					    Pro Shop
					  </label>
					</div>
					<div class="form-check">
					  <label class="form-check-label">
					    <input class="form-check-input" name="golf_lessons" type="checkbox" value="1">
					    Lessons Offered
					  </label>
					</div>
					<div class="form-check">
					  <label class="form-check-label">
					    <input class="form-check-input" name="caddies" type="checkbox" value="1">
					    Caddies
					  </label>
					</div>
					<div class="form-check">
					  <label class="form-check-label">
					    <input class="form-check-input" name="lockers" type="checkbox" value="1">
					    Lockers
					  </label>
					</div>
					<div class="form-check">
					  <label class="form-check-label">
					    <input class="form-check-input" name="restaurant" type="checkbox" value="1">
					    Restaurant
					  </label>
					</div>
					{{-- <div class="tee-box-controller">
						<h4>Which tee box will you be playing?</h4>
						<div class="tee-box-selector" data-tee-box="gold_tee_length">Gold Tees</div>
						<div class="tee-box-selector" data-tee-box="blue_tee_length">Blue Tees</div>
						<div class="tee-box-selector" data-tee-box="white_tee_length">White Tees</div>
						<div class="tee-box-selector" data-tee-box="red_tee_length">Red Tees</div>
					</div> --}}
				</div>
				<div class="col-sm-4">
					<div id="hole-info">
						<div class="col-md-12 pad0" id="holes">
							{{-- APPEND ALL HOLES HERE (from resources/assets/courseForm.js) --}}
						</div>
					</div>
				</div>
				{{-- TEMP BTN --}}
				<button type="submit" class="btn btn-block btn-success">Create Course</button>
			</form>
		</div>
	</div>
@endsection