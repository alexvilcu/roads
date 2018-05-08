@extends('layouts.app')
@section('content')
<div class="container">
	<h3>Create working site</h3>
	<div class="row">
		<div class="col-lg-6">
			<input type="text" class="form-control" value="" id="searchText" placeholder="Enter the location here">
			<div id="map" class="map"></div>
		</div>
		<div class="col-lg-6">
			<form action="{{ route('sites.store') }}" method="post">
				@csrf
				<div class="form-group">
					<label for="address">Address</label>
					<input type="text" name="address" id="address" class="form-control" readonly="readonly">
				</div>
				<div class="form-group">
					<label for="description">Enter description</label>
					<textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
				</div>
				<div class="form-group">
					<label for="starting_date">Started at : </label>
					<input type="date" name="starting_date" id="starting_date" class="form-control">
				</div>
			</form>
		</div>
	</div>
</div>
	<script src="{{ asset('js/create-site.js') }}"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBRffcGDeG6ClxZLOifZEock_GQeIQbeXs&libraries=places&callback=initMap"
    async defer></script>
@endsection