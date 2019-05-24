@extends('layouts.admin')
@section('content')
    <h1>Create BookItem</h1>
    {!! Form::open(['method'=>'POST', 'action'=>'AdminBarcodesController@store','files'=>true]) !!}
    <div class="form-group">
        {!! Form::label('book_title', 'Title:') !!}
        {!! Form::text('book_title', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('book_isbn', 'Isbn:') !!}
        {!! Form::text('book_isbn', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Create BookItem', ['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
    @include('includes.form_error')
    </div>
    </div>

@stop


