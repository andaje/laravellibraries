@extends('layouts.admin')
@section('content')

    @if($books)

    <table class="table table-striped">
    <thead>
    <tr>
        <th>Author</th>
        <th>Title</th>
    </tr>
    </thead>
    <tbody>
        @foreach($books as $book )
            <tr>
                <td>{{$book->name}}</td>
                <td>{{$book->title}}</td>
                {{--<td>
                    @if(abs($book->barcode->count() - $book->rentCount->count() > 0))
                        @if($book->barcode->rent->return_date !== NULL)
                            <a href="{{route('rents.create', $book->barcode->rent->id)}}">Rent</a>
                        @else
                            <a href="{{route('rents.edit', $book->barcode->rent->id)}}">Return</a>
                        @endif
                    @else
                        'rented'

                    @endif
                </td>--}}
            </tr>
        @endforeach
    </tbody>
    </table>
    @endif
@stop
