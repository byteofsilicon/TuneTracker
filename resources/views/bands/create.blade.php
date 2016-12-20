@extends('partials.page-detail')

@section('page-content-header')
    <h1 class="item">Create a new band.</h1>
@endsection

@section('page-content-body')
    {!! Form::open(['route' => ['bands.store']]) !!}
        @include('bands.partials.form', ['submitButtonText' => 'Create Band', 'showAlbums' => false])
    {!! Form::close() !!}
@endsection
