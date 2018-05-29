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
		<div class="row">
			<div class="col-sm-2">
				
			</div>
		</div>			
			<form class="form-inline" action="{{ route('photo.store', ['siteId' => $workSite->id ]) }}" method="post" enctype="multipart/form-data">
				@csrf
				<div class="form-group mb-2">
					<input type="file" name="photo" id="file">
				</div>
				<button class="btn btn-success mb-2" type="submit">Add photo</button>
			</form>
		@if($activeCarouselPhoto != null)
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
		@endif
		<div class="row">
			<div id="map" class="map" style="width: 100%; height: 400px;"></div>
			<script>
				var map;
				  function initMap()  {
                  var buc = {lat:{{ $workSite->lat }} , lng: {{ $workSite->lng }} };
                  var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 14,
                    center: buc
                  });
                  var marker = new google.maps.Marker({
	              		position: {lat: {{ $workSite->lat }}, lng: {{ $workSite->lng }} },
	              		map: map
	              	});
                  }
			</script>
		</div>
		<div class="row" style="margin-top: 40px;">
			<div class="col-sm-6">
				<div id="disqus_thread"></div>
					<script>

					/**
					*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
					*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
					
					var disqus_config = function () {
					this.page.url = '{{ Request::url() }}';  // Replace PAGE_URL with your page's canonical URL variable
					this.page.identifier = {{ $workSite->id }}; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
					};
					
					(function() { // DON'T EDIT BELOW THIS LINE
					var d = document, s = d.createElement('script');
					s.src = 'https://roads-1.disqus.com/embed.js';
					s.setAttribute('data-timestamp', +new Date());
					(d.head || d.body).appendChild(s);
					})();
					</script>
					<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
			</div>
		</div>
	</div>
	
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBRffcGDeG6ClxZLOifZEock_GQeIQbeXs&libraries=places&callback=initMap"
    async defer></script>
@endsection