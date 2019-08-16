@extends('layouts.admin')
@section('content')
    <h1>Create Book</h1>
    {!! Form::open(['method'=>'POST', 'action'=>'AdminBooksController@store','files'=>true]) !!}

    <div class="form-group">
        {!! Form::label('photo_id', 'Photo:') !!}
        {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('author_id', 'Author:') !!}
        {!! Form::select('author_id', [' '=>'Choose Option'] + $authors,null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('edition', 'Edition:') !!}
        {!! Form::text('edition', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('year', 'Year:') !!}
        {!! Form::text('year', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('isbn', 'Isbn:') !!}
        {!! Form::text('isbn', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('description', 'Description:') !!}
        {!! Form::textarea('description', null , ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Create Book', ['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
    @include('includes.form_error')
@stop

