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
				<h3>Name</h3>
				<p>{{ $profile->name }}</p>
			</div>
			<div class="col-lg-4">
				<h3>Email</h3>
				<p>{{ $profile->email }}</p>
			</div>
		</div>
	</div>
@endsection