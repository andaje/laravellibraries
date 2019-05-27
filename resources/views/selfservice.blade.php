@extends('layouts.admin')
@section('content')

    @if($books)

    <table class="table table-striped">
    <thead>
    <tr>
        <th>Title</th>
        <th>Author</th>
    </tr>
    </thead>
    <tbody>
        @foreach($books as $book )
            <tr>
                <td>{{$book->name}}</td>
                <td>{{$book->title}}</td>
            </tr>
        @endforeach
    </tbody>
    </table>
    @endif
@stop
