@extends('layouts.admin')
@section('content')
    <h1>Authors</h1>

    {!! Form::model($author,['method'=>'PATCH', 'action'=>['AdminAuthorsController@update', $author->id],
    'files'=>true])
     !!}
    <div class="form-group">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Update Author', ['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}

    {!! Form::open(['method'=>'DELETE', 'action'=>['AdminAuthorsController@destroy', $author->id],
       'files'=>true])
        !!}
    <div class="form-group">
        {!! Form::submit('Delete Author', ['class'=>'btn btn-danger']) !!}
    </div>
    {!! Form::close() !!}

@stop
