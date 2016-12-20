<div class="form-group">
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
</div>

<div class="form-group">
    {!! Form::label('band_id', 'Bands') !!}
    {!! Form::select('band_id', $bands, null, ['id' => 'albumsBandList', 'class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('recorded_date', 'Recorded Date') !!}
    {!! Form::date('recorded_date', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('release_date', 'Release Date') !!}
    {!! Form::date('release_date', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('number_of_tracks', 'Number of tracks') !!}
    {!! Form::number('number_of_tracks', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('label', 'Label') !!}
    {!! Form::text('label', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('producer', 'Producer') !!}
    {!! Form::text('producer', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('genre', 'Genre') !!}
    {!! Form::text('genre', null, ['class' => 'form-control']) !!}
</div>

{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}
