@extends('partials.page-detail')

@section('page-content-header')
	@if(!empty($band))
		<h1 class="item">Edit: {{ $band->name }}</h1>
	@endif
@endsection

@section('page-content-body')
	@if (!empty($band))
        {{ Form::model($band, ['route' => ['bands.update', $band->id], 'method' => 'PUT']) }}
            @include('bands.partials.form', ['submitButtonText' => 'Update Band', 'showAlbums' => true])
        {{ Form::close() }}
	@else
		<h3 class="heading">Sorry we could not find the band you were looking for.</h3>
	@endif
@endsection
