@extends('partials.page-detail')

@section('page-content-header')
	@if(!empty($album))
        <h1 class="item">Edit: {{ $album->name }}</h1>
	@endif
@endsection

@section('page-content-body')
	@if (!empty($album))
        {{ Form::model($album, ['route' => ['albums.update', $album->id], 'method' => 'PUT']) }}
            @include('albums.partials.form', ['submitButtonText' => 'Update album', 'showAlbums' => true])
        {{ Form::close() }}
	@else
		<h3 class="heading">Sorry we could not find the album you were looking for.</h3>
	@endif
@endsection
