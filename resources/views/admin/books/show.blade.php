@extends('layouts.admin')
@section('content')
    <h1>All Books</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Photo</th>
            <th scope="col">Title</th>
            <th scope="col">Author</th>
            <th scope="col">Edition</th>
            <th scope="col">Year</th>
            <th scope="col">Isbn</th>
            <th scope="col">Description</th>
            <th scope="col">Total</th>
            <th scope="col">Rented</th>
            <th scope="col">Aviable</th>
            <th scope="col">Created_at</th>
            <th scope="col">Updated_at</th>

        </tr>
        </thead>
        <tbody>
        @if ($books)
            @foreach($books as $book)
                <tr>
                    <td>{{$book->id}}</td>
                    <td>
                        <img height="50" src="{{$book->photo ? asset($book->photo->file) :'http://place-hold.it/400x400'}}" alt="">
                    </td>
                    <td><a href="{{route('books.edit', $book->id)}}">{{$book->title}}</a></td>
                    <td>{{$book->author ? $book->author->name : 'uncateg'}}</td>
                    <td>{{$book->edition}}</td>
                    <td>{{$book->year}}</td>
                    <td>{{$book->isbn}}</td>
                    <td>{{$book->description}}</td>
                    <td>{{$book->barcode->count()}}</td>
                    <td>{{$book->rentCount->count()}}</td>
                    <td>
                        @if(abs($book->barcode->count() - $book->rentCount->count())> 0)
                            @if($book->rents)
                                <a href="{{route('rents.create')}}">Rent</a>
                            @else
                                <a href="{{route('rents.edit')}}">Return</a>
                            @endif
                        @else
                            Rented
                        @endif
                    </td>
                    <td>{{$book->created_at}}</td>
                    <td>{{$book->updated_at}}</td>
                    <td><a href="{{route('barcodes.create')}}">Create BookItem</a></td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
    {{--<div class="row">
        <div class="col-12">
            {{$posts->links()}}
        </div>
    </div>--}}
@stop


