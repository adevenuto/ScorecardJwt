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
				</div>
			
				<div class="col-sm-12">
					<div class='input-group input-group-sm col-sm-6'>
						{{-- <label for="course_name" class="col-form-label">Group Name</label> --}}
						<input type="text" class="form-control" placeholder="Enter Hole Group name">
					</div>
					<hr>
				</div>
			
				<div class="col-sm-4">
					<div class='input-group input-group-sm hole'>
	                 	<span class='input-group-addon' id='sizing-addon3'>Hole: "+i+"</span>
	                    <input type='text' class='form-control num-only' maxLength='3' name='"+attr+"[]' aria-describedby='sizing-addon3' placeholder='Enter hole length' required>
             		</div>
				</div>
				<div class="col-sm-4">
					<div class='input-group input-group-sm hole'>
	                 	<span class='input-group-addon' id='sizing-addon3'>Hole: "+i+"</span>
	                    <input type='text' class='form-control num-only' maxLength='3' name='"+attr+"[]' aria-describedby='sizing-addon3' placeholder='Enter hole length' required>
             		</div>
				</div>
				<div class="col-sm-4">
					<div class='input-group input-group-sm hole'>
	                 	<span class='input-group-addon' id='sizing-addon3'>Hole: "+i+"</span>
	                    <input type='text' class='form-control num-only' maxLength='3' name='"+attr+"[]' aria-describedby='sizing-addon3' placeholder='Enter hole length' required>
             		</div>
				</div>
				<div class="col-sm-4">
					<div class='input-group input-group-sm hole'>
	                 	<span class='input-group-addon' id='sizing-addon3'>Hole: "+i+"</span>
	                    <input type='text' class='form-control num-only' maxLength='3' name='"+attr+"[]' aria-describedby='sizing-addon3' placeholder='Enter hole length' required>
             		</div>
				</div>
				<div class="col-sm-4">
					<div class='input-group input-group-sm hole'>
	                 	<span class='input-group-addon' id='sizing-addon3'>Hole: "+i+"</span>
	                    <input type='text' class='form-control num-only' maxLength='3' name='"+attr+"[]' aria-describedby='sizing-addon3' placeholder='Enter hole length' required>
             		</div>
				</div>
				<div class="col-sm-4">
					<div class='input-group input-group-sm hole'>
	                 	<span class='input-group-addon' id='sizing-addon3'>Hole: "+i+"</span>
	                    <input type='text' class='form-control num-only' maxLength='3' name='"+attr+"[]' aria-describedby='sizing-addon3' placeholder='Enter hole length' required>
             		</div>
				</div>
				<div class="col-sm-4">
					<div class='input-group input-group-sm hole'>
	                 	<span class='input-group-addon' id='sizing-addon3'>Hole: "+i+"</span>
	                    <input type='text' class='form-control num-only' maxLength='3' name='"+attr+"[]' aria-describedby='sizing-addon3' placeholder='Enter hole length' required>
             		</div>
				</div>
				<div class="col-sm-4">
					<div class='input-group input-group-sm hole'>
	                 	<span class='input-group-addon' id='sizing-addon3'>Hole: "+i+"</span>
	                    <input type='text' class='form-control num-only' maxLength='3' name='"+attr+"[]' aria-describedby='sizing-addon3' placeholder='Enter hole length' required>
             		</div>
				</div>
				<div class="col-sm-4">
					<div class='input-group input-group-sm hole'>
	                 	<span class='input-group-addon' id='sizing-addon3'>Hole: "+i+"</span>
	                    <input type='text' class='form-control num-only' maxLength='3' name='"+attr+"[]' aria-describedby='sizing-addon3' placeholder='Enter hole length' required>
             		</div>
				</div>
			</div>
		</div>
	</div>
@endsection