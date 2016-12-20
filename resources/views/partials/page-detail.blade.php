@extends('partials.page-master')

@section('page-content')

	<div class="elevated container">
		<div class="heading-list border-btm">
            @yield('page-content-header')
		</div>

        @yield('page-content-body')
	</div>

@endsection