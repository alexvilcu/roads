@extends('layouts.app')
@section('content')
<div class="container">
	<h3>Create category</h3>
	<div class="row">
		<div class="col-lg-4">
			@include('flash::message')
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6">
			<form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data">
				@csrf
				<div class="form-group">
					<label for="name">Category name</label>
					<input type="text" name="name" id="name" class="form-control">
				</div>
				<div class="form-group">
					<button class="btn btn-success" type="submit">Submit</button>
				</div>
				
			</form>
		</div>
	</div>
</div>

@endsection