@extends('main')
@section('content')
	<h1>Create a course</h1>
	<div class="container">
		<div class="row">
			<form id="courseCreation" action="" method="POST">
				<div class="col-md-4">
					<label for="course_name" class="col-2 col-form-label">Name</label>
					<div class="form-group">
						<input type="text" class="form-control" id="course_name" name="course_name" required>
					</div>
					<label for="course_address" class="col-2 col-form-label">Address</label>
					<div class="form-group">
						<input type="text" class="form-control" id="course_address" name="course_address" required>
					</div>
					<label for="course_phone_number" class="col-2 col-form-label">Phone Number</label>
					<div class="form-group">
						<input type="text" class="form-control bfh-phone" name="course_phone_number" data-format="+1 (ddd) ddd-dddd" required>
					</div>
					<label for="course_postal_code" class="col-2 col-form-label">Zip Code</label>
					<div class="form-group">
						<input type="text" class="form-control" id="course_postal_code" name="course_postal_code">
					</div>
					<label for="course_website" class="col-2 col-form-label">Website</label>
					<div class="form-group">
						<input type="text" class="form-control" id="course_website" name="course_website">
					</div>
					<label for="course_email" class="col-2 col-form-label">Email</label>
					<div class="form-group">
						<input type="email" class="form-control" id="course_email" name="course_email">
					</div>
					<label for="course_country" class="col-2 col-form-label">Country</label>
					<div class="form-group">
						<select name="course_country" class="form-control countries" id="cityId" required="required">
							<option value="">Select Country</option>
						</select>
					</div>
					
					<label for="course_state" class="col-2 col-form-label">State</label>
					<div class="form-group">
						<select name="course_state" class="form-control states" id="stateId" required>
							<option value="">Select State</option>
						</select>
					</div>
					
					<label for="course_city" class="col-2 col-form-label">City</label>
					<div class="form-group">
						<select name="course_city" class="form-control cities" id="cityId" required>
							<option value="">Select City</option>
						</select>
					</div>
				</div>
				<div class="col-md-4">
					<label for="tournament_tee_length" class="col-2 col-form-label">Tournament Tee Length</label>
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
					</div>
					<label for="course_price" class="col-2 col-form-label">Price</label>
					<select class="custom-select form-group form-control" name="course_price">
						<option value="inexpensive" selected>$</option>
						<option value="moderate">$$</option>
						<option value="high">$$$</option>
						<option value="expensive">$$$$</option>
					</select>
					<label for="course_holes" class="col-2 col-form-label">Holes</label>
					<select class="custom-select form-group form-control" name="course_holes">
						<option value="9" selected>9</option>
						<option value="18">18</option>
						<option value="27">27</option>
						<option value="36">36</option>
					</select>
					<div class="form-check">
					  <label class="form-check-label">
					    <input class="form-check-input" type="checkbox" value="true">
					    Course Offers Membership
					  </label>
					</div>
				</div>
				<div class="col-md-4">
					
				</div>
			</form>
		</div>
	</div>
@endsection