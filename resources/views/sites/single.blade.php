@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-lg-4">
				<h3>{{ $site->address }}</h3>
			</div>
			<div class="col-lg-4">
				<h3>Starting date</h3>
				@if($site->starting_date !== null)
					<p>{{ $site->starting_date }}</p>
				@else
					<p>Starting date not set</p>
				@endif
			</div>
			<div class="col-lg-4">
				<h3>Ending date</h3>
				@if($site->ending_date !== null)
					<p>{{ $site->ending_date }}</p>
				@else
					<p>Not finished yet</p>
				@endif
			</div>		
		</div>
		<div class="row">
			<div class="col-lg-4">
				<form action="">
					<div class="form-control">
						<input type="file">
					</div>
				</form>
			</div>
			<div class="col-lg-3">
				<button class="btn btn-success">Add photo</button>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
				  <div class="carousel-inner">
				    <div class="carousel-item active">
				      <img class="d-block w-100" src="..." alt="First slide">
				    </div>
				    <div class="carousel-item">
				      <img class="d-block w-100" src="..." alt="Second slide">
				    </div>
				    <div class="carousel-item">
				      <img class="d-block w-100" src="..." alt="Third slide">
				    </div>
				  </div>
				  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
				    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
				    <span class="sr-only">Previous</span>
				  </a>
				  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
				    <span class="carousel-control-next-icon" aria-hidden="true"></span>
				    <span class="sr-only">Next</span>
				  </a>
				</div>
			</div>
		</div>
	</div>
@endsection