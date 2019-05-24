@extends('layouts.admin')
@section('content')
    <h1>Edit Book</h1>
    {!! Form::model($book,['method'=>'GET', 'action'=>['AdminBooksController@show', $book->id],
     'files'=>true])
      !!}
    <div class="form-group">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class'=>'form-control']) !!}
    </div>


    <div class="form-group">
        {!! Form::label('isbn', 'Isbn:') !!}
        {!! Form::text('isbn', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Add BookItem', ['class'=>'btn btn-primary col-md-6']) !!}
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

