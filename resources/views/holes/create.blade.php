@extends('main')
{{-- @section('courses.create')
	<script src="{{ asset('js/validate.js') }}"></script>
	<script src="{{ asset('js/bootstrap-formhelpers.min.js') }}"></script>
@endsection --}}
@section('content')
	<div class="container" id="create-holes-forms">
		<div class="row">
			<div class="col-sm-10 col-sm-offset-1">
				<div class="row">
					<div class="col-sm-12">
						<h1>Create Holes for {{$course->course_name}}</h1>
						<hr>
					</div>
					<div class="the-teebox col-sm-6">
						<div class="form-group">
							<label for="teebox-name">Enter A Teebox:</label>
							<input type='text' id="teebox-name" class='form-control b-rad3' maxLength='30' placeholder='eg...Black, Championship, Red, etc..' required>
							<small>* 1 req, additional teeboxs can be added later</small>
						</div>
						<hr>
					</div>
					<div class="add-holes col-sm-6 clear">
						<p>Add Holes:</p>
						<button class="btn btn-success btn-small b-rad3 hole-count" data-hole-count="9">Add 9 Holes</button>	
						<button class="btn btn-success btn-small b-rad3 hole-count" data-hole-count="18">Add 18 Holes</button>
						<hr>
					</div>
					<input type="hidden" id="course-id" value="{{$course->id}}">
					<div id="holes-container" class="clear">
						{{-- RENDER HOLES HERE (createForm.js) --}}
					</div>
					<div class="col-sm-12">
						<button type="submit" class="btn btn-default btn-block b-rad3 create-holes-submit">Create Holes</button>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection