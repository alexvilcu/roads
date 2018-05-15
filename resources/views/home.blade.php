@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-lg-4">
                <h3>Actions</h3>
                <ul class="user-actions">
                    <li><a href="{{ route('sites.create') }}">Add worksite</a> </li>
                </ul>
            </div>
            <div class="col-lg-4">
                <h3>Worksites</h3>
                <ul class="user-actions">
                    @foreach($workSites as $workSite)
                    	<li><a href="{{ route('sites.show', ['id' => $workSite->id]) }}">{{ $workSite->address }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row" style="margin-top: 20px;">
        	<div class="col-lg-12">
        		<div class="map" id="map" style="width:100%; height: 400px; "></div>
        	</div>           
        </div>
        <script>
        	var map;
        	var locations = {!! json_encode($workSites) !!};
			  function initMap()  {
              var ro = {lat:45.9432 , lng: 24.9668};
              var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 7,
                center: ro
              });
              
              for (var i = 0; i < locations.length; i++) {
              var marker = new google.maps.Marker({
              		position: {lat: locations[i].lat, lng: locations[i].lng},
              		map: map
              	});
              }
          }

        </script>
</div>
 <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBRffcGDeG6ClxZLOifZEock_GQeIQbeXs&libraries=places&callback=initMap"
 ></script>
@endsection
