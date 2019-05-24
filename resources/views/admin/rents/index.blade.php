@extends('layouts.admin')
@section('content')
    <h1>Tranzaction</h1>
    <div class="col-md-12">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">User</th>
                <th scope="col">Title</th>
                <th scope="col">Author</th>
                <th scope="col">BookItem</th>
                <th scope="col">Rental Date</th>
                <th scope="col">Return Date</th>
                <th scope="col">Status</th>
                <th scope="col">Created</th>
                <th scope="col">Updated</th>
            </tr>
            </thead>
            <tbody>
            @if ($rents)
                @foreach($rents as $rent)
                    <tr>
                        <td>{{$rent->id}}</td>
                        <td><a href="{{route('users.edit', $rent->user->id)}}">{{$rent->user->first_name}} {{$rent->user->last_name}}</a></td>
                        <td>{{$rent->barcode->book->title}}</td>
                        <td>{{$rent->barcode->book->author->name}}</td>
                        <td>{{$rent->barcode->book_item}}</td>
                        <td>{{$rent->rental_date}}</td>
                        <td>{{$rent->return_date}}</td>
                        <td><a href="{{route('rents.edit', $rent->id)}}">{{$rent->return_date !== NULL ? 'Aviable': 'Rented'}}</a></td>
                        <td>{{$rent->created_at ? $rent->created_at->diffForHumans() : 'no date'}}</td>
                        <td>{{$rent->updated_at ? $rent->updated_at->diffForHumans() : 'no date'}}</td>
                    </tr>
                @endforeach
            @endif
            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            </tbody>
        </table>
    </div>





@stop
