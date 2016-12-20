@extends('index')

@section('content')

	@include('partials.navbar')

	<div class="messages container">
		@include('flash::message')
    	@include('errors.list')
	</div>

	@yield('page-content')


@endsection