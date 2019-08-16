@extends('layouts.layout')
@section('content')
    <div class="content" style="width: 1200px">
        <div class="pt-md-4">
        @include('includes.search',['url'=>''])
    </div>
        <h2><b>All Books</b></h2>
        @if($barcodes)
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Photo</th>
                    <th scope="col">Title</th>
                    <th scope="col">Author</th>
                    <th scope="col">Year</th>
                    <th scope="col">Description</th>
                    <th scope="col">Rent</th>


                </tr>
                </thead>
                <tbody>
                @foreach($barcodes as $barcode)
                    @if ($barcode->available == 1)
                        <tr>
                                <td><img class="responsive" width="50" height="50"
                                     src="{{isset($barcode->book->photo->file) ? asset($barcode->book->photo->file) : 'http://place-hold.it/50x50'}}"></td>
                                <td>{{$barcode->book->title}}</td>
                                <td>{{$barcode->book->author->name}}</td>
                                <td>{{$barcode->book->year}}</td>
                                <td>{{$barcode->book->description}}</td>
                                <td>
                                    @auth
                                            <input type="hidden" name="available" value="0">
                                            {!! Form::open(['method'=>'PATCH', 'action'=>['FrontendController@update', $barcode->id]]) !!}
                                            {!! Form::submit('Rent',['class'=>'btn btn-primary btn-sm']) !!}
                                            {!! Form::close() !!}
                                        @endauth
                                </td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        @endif
        <div class="row">
            <div class="col-12">
                {{$barcodes->render()}}
            </div>
        </div>
    </div>
@stop
