@extends('partials.page-detail')

@section('page-content-header')
	<h1 class="item">Albums</h1>
	<a href="{{ URL::route('albums.create') }}" class="btn btn-default item">Create</a>
@endsection

@section('page-content-body')
	@if (!$albums->isEmpty())
		@include('albums.partials.filter')
		@include('albums.partials.album-list')
	@else
		<h3>You have not added any albums yet!</h3>
	@endif
@endsection
