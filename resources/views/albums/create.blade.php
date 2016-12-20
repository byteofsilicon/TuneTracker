
@extends('partials.page-detail')

@section('page-content-header')
    <h1 class="item">Create a new album.</h1>
@endsection

@section('page-content-body')
    {!! Form::open(['route' => ['albums.store']]) !!}
        @include('albums.partials.form', ['submitButtonText' => 'Create album'])
    {!! Form::close() !!}
@endsection
