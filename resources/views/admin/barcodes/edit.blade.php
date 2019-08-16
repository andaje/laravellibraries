@extends('layouts.admin')
@section('content')
    <h1>Create BookItem</h1>
    {!! Form::model($book,['method'=>'PATCH', 'action'=>['AdminBarcodesController@update', $book->id],
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
        {!! Form::submit('Create BookItem', ['class'=>'btn btn-primary col-md-6']) !!}
    </div>
    {!! Form::close() !!}
    {!! Form::open(['method'=>'DELETE', 'action'=>['AdminBarcodesController@destroy', $book->id]]) !!}
    <div class="form-group">
        {!! Form::submit('Delete BookItem', ['class'=>'btn btn-danger col-md-6']) !!}
    </div>
    {!! Form::close() !!}
    @include('includes.form_error')
    </div>
    </div>

@stop


