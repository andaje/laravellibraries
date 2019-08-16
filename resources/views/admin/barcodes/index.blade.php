@extends('layouts.admin')
@section('content')
    <h1>BookItem</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Title</th>
            <th scope="col">Barcode</th>
            <th scope="col">available</th>
            <th scope="col">Buttons</th>

        </tr>
        </thead>
        <tbody>
        @if($barcodes)
            @foreach($barcodes as $barcode)
                <tr>
                    <td>{{$barcode->id}}</td>
                    <td>{{$barcode->book->title}}</td>
                    <td>{!! QrCode::margin(0)->size(70)->generate($barcode->book_item); !!}</td>

                    <td>{{$barcode->available == true ?'Available' : 'Not Available' }}</td>
                    <td>
                        @if ($barcode->available == 1)
                            <input type="hidden" name="available" value="0">
                            {!! Form::open(['method'=>'PATCH', 'action'=>['AdminRentsController@update', $barcode->id]]) !!}
                            {!! Form::submit('Rent',['class'=>'btn btn-primary btn-sm']) !!}
                            {!! Form::close() !!}
                        @else
                            <input type="hidden" name="available" value="1">
                            {!! Form::open(['method'=>'PATCH', 'action'=>['AdminRentsController@update', $barcode->id]]) !!}
                            {!! Form::submit('Return',['class'=>'btn btn-success btn-sm']) !!}
                            {!! Form::close() !!}
                        @endif
                    </td>
                    <td>

                        {!! Form::open(['method'=>'DELETE', 'action'=>['AdminBarcodesController@destroy', $barcode->id]]) !!}
                        <input type="hidden" name="available" value="0">
                        {!! Form::submit('Delete',['class'=>'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        @endif

        </tbody>
    </table>
    <div class="row">
        <div class="col-12">
            {{$barcodes->links()}}
        </div>
    </div>
@stop

