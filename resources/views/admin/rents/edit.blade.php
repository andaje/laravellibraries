@extends('layouts.admin')
@section('content')
    <h1>Tranzaction</h1>
    {!! Form::model($rent,['method'=>'PATCH', 'action'=>['AdminRentsController@update', $rent->id],
    'files'=>true])!!}
    <div class="form-group">
        {!! Form::label('user_first_name', 'First Name:') !!}
        {!! Form::text('user_first_name', $rent->user->first_name , null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('user_last_name', 'Last Name:') !!}
        {!! Form::text('user_last_name', $rent->user->last_name , null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('rental_book_title', 'Title:') !!}
        {!! Form::text('rental_book_title',$rent->barcode->book->title, null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('rental_book_author', 'Author:') !!}
        {!! Form::text('rental_book_author', $rent->barcode->book->author->name, null, ['class'=>'form-control']) !!}
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
        {!! Form::label('created_at', 'Created Date:') !!}
        {!! Form::text('created_at' ,null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('updated_at', 'Updated Date:') !!}
        {!! Form::text('updated_at' ,null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Update Tranzaction', ['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}


@stop
