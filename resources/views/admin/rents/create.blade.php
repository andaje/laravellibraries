@extends('layouts.admin')
@section('content')

    <h1>Create Tranzaction</h1>


    {!! Form::open(['method'=>'POST', 'action'=>'AdminRentsController@store','files'=>true]) !!}

    <div class="form-group">
        {!! Form::label('user_first_name', 'First Name:') !!}
        {!! Form::text('user_first_name', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('user_last_name', 'Last Name:') !!}
        {!! Form::text('user_last_name', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('rental_book_item', 'Book_item:') !!}
        {!! Form::text('rental_book_item',null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('rental_date', 'Rental Date:') !!}
        {!! Form::text('rental_date' ,null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('return_date', 'Return Date:') !!}
        {!! Form::text('return_date' ,null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Create Tranzaction', ['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
    @include('includes.form_error')
@stop
