@extends('layouts.admin')
@section('content')
    <h1>Edit BookItem</h1>

    {!! Form::model($barcode,['method'=>'PATCH', 'action'=>['AdminBarcodesController@edit', $barcode->id],
     'files'=>true])
      !!}
    <div class="form-group">
        {!! Form::label('book_title', 'Title:') !!}
        {!! Form::text('book_title', $barcode->book->title, null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('book_isbn', 'Isbn:') !!}
        {!! Form::text('book_isbn', $barcode->book->isbn, null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Update BookItem', ['class'=>'btn btn-primary col-md-6']) !!}
    </div>

    {!! Form::close() !!}
    {!! Form::open(['method'=>'DELETE', 'action'=>['AdminBarcodesController@destroy', $barcode->id]]) !!}
    <div class="form-group">
        {!! Form::submit('Delete BookItem', ['class'=>'btn btn-danger col-md-6']) !!}
    </div>
    {!! Form::close() !!}
    @include('includes.form_error')
    </div>
    </div>

@stop


