@extends('layouts.admin')
@section('content')
    <h1>All Barcodes</h1>

    <div class="col-md-6">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Isbn</th>
                <th scope="col">Book</th>
                <th scope="col">Item</th>
                <th scope="col">Item</th>
                <th scope="col">Created</th>
                <th scope="col">Updated</th>
            </tr>
            </thead>
            <tbody>
            @if ($barcodes)

                @foreach($barcodes as $barcode)
                    <tr>
                            <td>{{$barcode->id}}</td>
                            <td><a href="{{route('barcodes.edit', $barcode->id)}}">{{$barcode->book->isbn}}</a></td>
                            <td>{{$barcode->book ? $barcode->book->title : 'Uncategorized'}}</td>
                            <td>{{$barcode->book_item}}</td>

                            <td>{{$barcode->rent->first()->return_date}}</td>
                            <td>{{$barcode->created_at ? $barcode->created_at->diffForHumans() : 'no date'}}</td>
                            <td>{{$barcode->updated_at ? $barcode->updated_at->diffForHumans() : 'no date'}}</td>
                    </tr>




                @endforeach
            @endif
            </tbody>
        </table>
    </div>
    <div class="col-md-6">

    </div>
@stop
