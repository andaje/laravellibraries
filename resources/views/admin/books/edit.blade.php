@extends('layouts.admin')
@section('content')
    <h1>Edit Book</h1>
    {!! Form::model($book,['method'=>'PATCH', 'action'=>['AdminBooksController@update', $book->id],
     'files'=>true])
      !!}

    <div class="form-group">
        {!! Form::label('photo_id', 'Photo:') !!}
        {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('author_name', 'Author:') !!}
        {!! Form::text('author_name', $book->author->name , null, ['class'=>'form-control']) !!}
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
        {!! Form::submit('Update Book', ['class'=>'btn btn-primary col-md-6']) !!}
    </div>

    {!! Form::close() !!}
    {!! Form::open(['method'=>'DELETE', 'action'=>['AdminBooksController@destroy', $book->id]]) !!}
    <div class="form-group">
        {!! Form::submit('Delete Book', ['class'=>'btn btn-danger col-md-6']) !!}
    </div>
    {!! Form::close() !!}
    @include('includes.form_error')
    </div>
    </div>

@stop

