@extends('main')
{{-- @section('courses.create')
	<script src="{{ asset('js/validate.js') }}"></script>
	<script src="{{ asset('js/bootstrap-formhelpers.min.js') }}"></script>
@endsection --}}
@section('content')
	<div class="container" id="create-holes-form">
		<div class="row">
			<div class="col-sm-10 col-sm-offset-1">
				<div class="row">
					<div class="col-sm-12">
						<h1>Create Holes for {{$course->course_name}}</h1>
						<hr>
					</div>
					<div class="the-teebox col-sm-6">
						<div class="form-group">
							<label for="course_holes">Enter A Teebox:</label>
							<input type='text' class='form-control b-rad3' maxLength='30' placeholder='eg...Black, Championship, Red, etc..' required>
							<small>* 1 req, additional teeboxs can be added later</small>
						</div>
						<hr>
					</div>
					<div class="add-holes col-sm-6 clear">
						<p>Add Holes:</p>
						<button class="btn btn-success btn-small b-rad3">Add 9</button>	
						<button class="btn btn-success btn-small b-rad3">Add 18</button>
						<hr>
					</div>
					<div class="holes-container clear">
						<div class="col-sm-6">
							<div class="holes">
								<div class="course-holes-header flex">
									<span class="col-xs-4">Hole #</span>
									<div class="col-xs-1"></div>
									<span class="col-xs-7">Hole Length</span>
								</div>
								{{-- Loop here --}}
								<div class="hole flex">
									<input type="text" maxLength='2' class="col-xs-4 num-only">
									<div class="col-xs-1 text-center seperator">-</div>
									<input type="text" maxLength='3' class="col-xs-7 num-only">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection