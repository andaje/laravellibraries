@extends('layouts.layout')
@section('content')
    <div class="content">

        <h3 class="text-left pt-5"><b>All Rents</b></h3>
        @if(!$rentals->isEmpty())
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Book</th>
                    <th scope="col">Start</th>
                    <th scope="col">Return</th>
                    <th scope="col">Max_date</th>


                </tr>
                </thead>
                <tbody>
                @foreach($rentals as $rental)
                    <tr>
                        <td>{{$rental->id}}</td>
                        <td>{{$rental->user->first_name. ' '. $rental->user->last_name}}</td>
                        <td>{{$rental->barcode->book->title}}</td>
                        <td>{{$rental->rental_start}}</td>
                        <td>{{$rental->return_date}}</td>
                        <td>{{$rental->max_date}}</td>
                        <td>
                            @if ($rental->barcode->available == 0)
                                <input type="hidden" name="available" value="1">
                                {!! Form::open(['method'=>'PATCH', 'action'=>['FrontendController@returnBook', $rental->barcode->id]]) !!}
                                {!! Form::submit('Return book',['class'=>'btn btn-info btn-sm']) !!}
                                {!! Form::close() !!}
                            @endif
                        </td>
                    </tr>
                @endforeach


                </tbody>
            </table>
        @endif
        @if ($rentals->isEmpty())
            <h4 class="pt-2">You didn't rent books</h4>
        @endif
        <div class="row">
            <div class="col-12">
                {{$rentals->links()}}
            </div>
        </div>

@stop
