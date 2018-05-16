@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-lg-4">
				@include('flash::message')
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4">
				<h3>{{ $workSite->address }}</h3>
			</div>
			<div class="col-lg-4">
				<h3>Starting date</h3>
				@if($workSite->starting_date !== null)
					<p>{{ $workSite->starting_date }}</p>
				@else
					<p>Starting date not set</p>
				@endif
			</div>
			<div class="col-lg-4">
				<h3>Ending date</h3>
				@if($workSite->ending_date !== null)
					<p>{{ $workSite->ending_date }}</p>
				@else
					<p>Not finished yet</p>
				@endif
			</div>		
		</div>			
			<form class="form-inline" action="{{ route('photo.store', ['siteId' => $workSite->id ]) }}" method="post" enctype="multipart/form-data">
				@csrf
				<div class="form-group mb-2">
					<input type="file" name="photo">
				</div>
				<button class="btn btn-success mb-2" type="submit">Add photo</button>
			</form>
		<div class="carousel">
			<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
			  <div class="carousel-inner">
			  	<div class="carousel-item active">
			      <img class="d-block w-100" src="{{ asset('uploads/photos/' . $activeCarouselPhoto->path) }}" alt="First slide" style="width: 289px; height: 189px;">
			    </div>
			  	@foreach($photos as $photo)
			    <div class="carousel-item">
			      <img class="d-block w-100" src="{{ asset('uploads/photos/' . $photo->path) }}" alt="First slide" style="width: 289px; height: 189px;">
			    </div>
			    @endforeach
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
		<div class="row">
			<div id="map" class="map" style="width: 100%; height: 400px;"></div>
			<script src="{{ asset('js/show-site.js') }}"></script>
		</div>
	</div>
	
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBRffcGDeG6ClxZLOifZEock_GQeIQbeXs&libraries=places&callback=initMap"
    async defer></script>
@endsection