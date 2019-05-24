@extends('layouts.admin')
@section('content')
    <h1>Inventory</h1>
    <div class="col-md-12">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Title</th>
                <th scope="col">BookItem</th>
                <th scope="col">Return Date</th>
                <th scope="col">Created</th>
                <th scope="col">Updated</th>
            </tr>
            </thead>
            <tbody>
            @if ($inventories)
                @foreach($inventories as $inventory)
                    <tr>
                        <td>{{$inventory->id}}</td>
                        <td>{{$inventory->barcode->book->title}}</td>
                        <td>{{$inventory->barcode->book_item}}</td>
                        <td>{{$inventory->rent->first()->return_date}}</td>
                        <td>{{$inventory->created_at ? $inventory->created_at->diffForHumans() : 'no date'}}</td>
                        <td>{{$inventory->updated_at ? $inventory->updated_at->diffForHumans() : 'no date'}}</td>
                    </tr>
                @endforeach
            @endif

            </tbody>
        </table>
    </div>





@stop
