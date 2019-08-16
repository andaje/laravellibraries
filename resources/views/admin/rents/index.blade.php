@extends('layouts.admin')
@section('content')
    <h1>All Rentals</h1>
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
        @foreach($rents as $rental)

            <tr>
                <td>{{$rental->id}}</td>
                <td>{{$rental->user->first_name. ' '. $rental->user->last_name}}</td>
                <td>{{$rental->barcode->book->title}}</td>
                <td>{{$rental->rental_start}}</td>
                <td>{{$rental->return_date}}</td>
                <td>{{$rental->max_date}}</td>
            </tr>
        @endforeach


        </tbody>
    </table>
    <div class="row">
        <div class="col-12">
            {{$rents->links()}}
        </div>
    </div>
@stop
