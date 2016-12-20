@extends('partials.page-detail')

@section('page-content-header')
	<h1 class="item">Bands</h1>
	<a href="{{ URL::route('bands.create') }}" class="btn btn-default item">Create</a>
@endsection

@section('page-content-body')
	@if (!$bands->isEmpty())
		@include('bands.partials.band-list')
	@else
		<h3>You have not added any bands yet!</h3>
	@endif
@endsection
