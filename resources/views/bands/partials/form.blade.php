<div class="form-group">
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
</div>

<div class="form-group">
    {!! Form::label('start_date', 'Start Date') !!}
    {!! Form::date('start_date', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('website', 'Website') !!}
    {!! Form::text('website', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('still_active', 'Still Active') !!}
    {!! Form::select('still_active', [1 => 'Yes', 0 => 'No'], null, ['class' => 'form-control']) !!}
</div>

@if ($showAlbums)
<div class="form-group">
    {!! Form::label('album_list', 'Albums') !!}
    {!! Form::select('album_list[]', $albums, null, ['id' => 'bandsAlbumList', 'class' => 'form-control', 'multiple']) !!}
</div>
@endif

{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}