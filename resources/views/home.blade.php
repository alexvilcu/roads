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
        </div>
</div>
@endsection
