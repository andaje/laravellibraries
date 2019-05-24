@extends('layouts.admin')
@section('content')
    <h1>All Authors</h1>
    <div class="col-md-6">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Created</th>
                <th scope="col">Updated</th>
            </tr>
            </thead>
            <tbody>
            @if ($authors)
                @foreach($authors as $author)
                    <tr>
                        <td>{{$author->id}}</td>
                        <td><a href="{{route('authors.edit', $author->id)}}">{{$author->name}}</a></td>
                        <td>{{$author->created_at ? $author->created_at->diffForHumans() : 'no date'}}</td>
                        <td>{{$author->updated_at ? $author->updated_at->diffForHumans() : 'no date'}}</td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
    <div class="col-md-6">
        {!! Form::open(['method'=>'POST', 'action'=>'AdminAuthorsController@store','files'=>true]) !!}
        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Create Author', ['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@stop
