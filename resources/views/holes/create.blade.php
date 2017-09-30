@extends('main')
{{-- @section('courses.create')
	<script src="{{ asset('js/validate.js') }}"></script>
	<script src="{{ asset('js/bootstrap-formhelpers.min.js') }}"></script>
@endsection --}}
@section('content')
	<div class="container" id="create-holes-form">
		<div class="row">
			<div class="col-sm-10 col-sm-offset-1">
				<div class="col-sm-12">
					<h1>Create Holes for {{$course->course_name}}</h1>
					<hr>
				</div>
				<div class="col-sm-6">
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
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label for="course_holes" class="col-2 col-form-label">Enter A Teebox</label>
						<input type='text' class='form-control b-rad5' maxLength='30' placeholder='eg...Black, Championship, Red, etc..' required>
					</div>
				</div>
				<div class="col-sm-4">
					<div class='input-group input-group-sm hole'>
	                 	<span class='input-group-addon' id='sizing-addon3'>Hole: "+i+"</span>
	                    <input type='text' class='form-control num-only' maxLength='3' name='"+attr+"[]' aria-describedby='sizing-addon3' placeholder='Enter length' required>
             		</div>
             		<div class='input-group input-group-sm hole'>
	                 	<span class='input-group-addon' id='sizing-addon3'>Hole: "+i+"</span>
	                    <input type='text' class='form-control num-only' maxLength='3' name='"+attr+"[]' aria-describedby='sizing-addon3' placeholder='Enter length' required>
             		</div>
             		<div class='input-group input-group-sm hole'>
	                 	<span class='input-group-addon' id='sizing-addon3'>Hole: "+i+"</span>
	                    <input type='text' class='form-control num-only' maxLength='3' name='"+attr+"[]' aria-describedby='sizing-addon3' placeholder='Enter length' required>
             		</div>
             		<div class='input-group input-group-sm hole'>
	                 	<span class='input-group-addon' id='sizing-addon3'>Hole: "+i+"</span>
	                    <input type='text' class='form-control num-only' maxLength='3' name='"+attr+"[]' aria-describedby='sizing-addon3' placeholder='Enter length' required>
             		</div>
             		<div class='input-group input-group-sm hole'>
	                 	<span class='input-group-addon' id='sizing-addon3'>Hole: "+i+"</span>
	                    <input type='text' class='form-control num-only' maxLength='3' name='"+attr+"[]' aria-describedby='sizing-addon3' placeholder='Enter length' required>
             		</div>
             		<div class='input-group input-group-sm hole'>
	                 	<span class='input-group-addon' id='sizing-addon3'>Hole: "+i+"</span>
	                    <input type='text' class='form-control num-only' maxLength='3' name='"+attr+"[]' aria-describedby='sizing-addon3' placeholder='Enter length' required>
             		</div>
             		<div class='input-group input-group-sm hole'>
	                 	<span class='input-group-addon' id='sizing-addon3'>Hole: "+i+"</span>
	                    <input type='text' class='form-control num-only' maxLength='3' name='"+attr+"[]' aria-describedby='sizing-addon3' placeholder='Enter length' required>
             		</div>
             		<div class='input-group input-group-sm hole'>
	                 	<span class='input-group-addon' id='sizing-addon3'>Hole: "+i+"</span>
	                    <input type='text' class='form-control num-only' maxLength='3' name='"+attr+"[]' aria-describedby='sizing-addon3' placeholder='Enter length' required>
             		</div>
             		<div class='input-group input-group-sm hole'>
	                 	<span class='input-group-addon' id='sizing-addon3'>Hole: "+i+"</span>
	                    <input type='text' class='form-control num-only' maxLength='3' name='"+attr+"[]' aria-describedby='sizing-addon3' placeholder='Enter length' required>
             		</div>
				</div>
				<div class="col-sm-4">
					<div class='input-group input-group-sm hole'>
	                 	<span class='input-group-addon' id='sizing-addon3'>Hole: "+i+"</span>
	                    <input type='text' class='form-control num-only' maxLength='3' name='"+attr+"[]' aria-describedby='sizing-addon3' placeholder='Enter length' required>
             		</div>
             		<div class='input-group input-group-sm hole'>
	                 	<span class='input-group-addon' id='sizing-addon3'>Hole: "+i+"</span>
	                    <input type='text' class='form-control num-only' maxLength='3' name='"+attr+"[]' aria-describedby='sizing-addon3' placeholder='Enter length' required>
             		</div>
             		<div class='input-group input-group-sm hole'>
	                 	<span class='input-group-addon' id='sizing-addon3'>Hole: "+i+"</span>
	                    <input type='text' class='form-control num-only' maxLength='3' name='"+attr+"[]' aria-describedby='sizing-addon3' placeholder='Enter length' required>
             		</div>
             		<div class='input-group input-group-sm hole'>
	                 	<span class='input-group-addon' id='sizing-addon3'>Hole: "+i+"</span>
	                    <input type='text' class='form-control num-only' maxLength='3' name='"+attr+"[]' aria-describedby='sizing-addon3' placeholder='Enter length' required>
             		</div>
             		<div class='input-group input-group-sm hole'>
	                 	<span class='input-group-addon' id='sizing-addon3'>Hole: "+i+"</span>
	                    <input type='text' class='form-control num-only' maxLength='3' name='"+attr+"[]' aria-describedby='sizing-addon3' placeholder='Enter length' required>
             		</div>
             		<div class='input-group input-group-sm hole'>
	                 	<span class='input-group-addon' id='sizing-addon3'>Hole: "+i+"</span>
	                    <input type='text' class='form-control num-only' maxLength='3' name='"+attr+"[]' aria-describedby='sizing-addon3' placeholder='Enter length' required>
             		</div>
             		<div class='input-group input-group-sm hole'>
	                 	<span class='input-group-addon' id='sizing-addon3'>Hole: "+i+"</span>
	                    <input type='text' class='form-control num-only' maxLength='3' name='"+attr+"[]' aria-describedby='sizing-addon3' placeholder='Enter length' required>
             		</div>
             		<div class='input-group input-group-sm hole'>
	                 	<span class='input-group-addon' id='sizing-addon3'>Hole: "+i+"</span>
	                    <input type='text' class='form-control num-only' maxLength='3' name='"+attr+"[]' aria-describedby='sizing-addon3' placeholder='Enter length' required>
             		</div>
             		<div class='input-group input-group-sm hole'>
	                 	<span class='input-group-addon' id='sizing-addon3'>Hole: "+i+"</span>
	                    <input type='text' class='form-control num-only' maxLength='3' name='"+attr+"[]' aria-describedby='sizing-addon3' placeholder='Enter length' required>
             		</div>
				</div>
				<div class="col-sm-4">
					<div class='input-group input-group-sm hole'>
	                 	<span class='input-group-addon' id='sizing-addon3'>Hole: "+i+"</span>
	                    <input type='text' class='form-control num-only' maxLength='3' name='"+attr+"[]' aria-describedby='sizing-addon3' placeholder='Enter length' required>
             		</div>
             		<div class='input-group input-group-sm hole'>
	                 	<span class='input-group-addon' id='sizing-addon3'>Hole: "+i+"</span>
	                    <input type='text' class='form-control num-only' maxLength='3' name='"+attr+"[]' aria-describedby='sizing-addon3' placeholder='Enter length' required>
             		</div>
             		<div class='input-group input-group-sm hole'>
	                 	<span class='input-group-addon' id='sizing-addon3'>Hole: "+i+"</span>
	                    <input type='text' class='form-control num-only' maxLength='3' name='"+attr+"[]' aria-describedby='sizing-addon3' placeholder='Enter length' required>
             		</div>
             		<div class='input-group input-group-sm hole'>
	                 	<span class='input-group-addon' id='sizing-addon3'>Hole: "+i+"</span>
	                    <input type='text' class='form-control num-only' maxLength='3' name='"+attr+"[]' aria-describedby='sizing-addon3' placeholder='Enter length' required>
             		</div>
             		<div class='input-group input-group-sm hole'>
	                 	<span class='input-group-addon' id='sizing-addon3'>Hole: "+i+"</span>
	                    <input type='text' class='form-control num-only' maxLength='3' name='"+attr+"[]' aria-describedby='sizing-addon3' placeholder='Enter length' required>
             		</div>
             		<div class='input-group input-group-sm hole'>
	                 	<span class='input-group-addon' id='sizing-addon3'>Hole: "+i+"</span>
	                    <input type='text' class='form-control num-only' maxLength='3' name='"+attr+"[]' aria-describedby='sizing-addon3' placeholder='Enter length' required>
             		</div>
             		<div class='input-group input-group-sm hole'>
	                 	<span class='input-group-addon' id='sizing-addon3'>Hole: "+i+"</span>
	                    <input type='text' class='form-control num-only' maxLength='3' name='"+attr+"[]' aria-describedby='sizing-addon3' placeholder='Enter length' required>
             		</div>
             		<div class='input-group input-group-sm hole'>
	                 	<span class='input-group-addon' id='sizing-addon3'>Hole: "+i+"</span>
	                    <input type='text' class='form-control num-only' maxLength='3' name='"+attr+"[]' aria-describedby='sizing-addon3' placeholder='Enter length' required>
             		</div>
             		<div class='input-group input-group-sm hole'>
	                 	<span class='input-group-addon' id='sizing-addon3'>Hole: "+i+"</span>
	                    <input type='text' class='form-control num-only' maxLength='3' name='"+attr+"[]' aria-describedby='sizing-addon3' placeholder='Enter length' required>
             		</div>
				</div>
			</div>
		</div>
	</div>
@endsection