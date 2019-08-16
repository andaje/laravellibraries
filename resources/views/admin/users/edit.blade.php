
@extends('layouts.admin')
@section('content')
    <h1>Edit User</h1>
    {!! Form::model($user,['method'=>'PATCH', 'action'=>['AdminUsersController@update', $user->id],'files'=>true]) !!}
    <div class="row">
        {{--<div class="col-md-3">
            <img class="img-responsive" src="{{//*$user->photo ? asset($user->photo->file) : 'http://place-hold.it/400x400'}}"**/
                 alt="">
        </div>--}}
        <div class="col-md-9">
            <div class="form-group">
                {!! Form::label('first_name', 'First Name:') !!}
                {!! Form::text('first_name', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('last_name', 'Last Name:') !!}
                {!! Form::text('last_name', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('email', 'E-mail:') !!}
                {!! Form::text('email', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('role_id', 'Role:') !!}
                {!! Form::select('role_id', [''=>'Choose options'] + $roles, null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('is_active', 'Status:') !!}
                {!! Form::select('is_active', array(1=>'Active', 0=>'Not Active'),null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('password', 'Password:') !!}
                {!! Form::password('password', ['class'=>'form-control']) !!}
            </div>
             <div class="form-group">
                {!! Form::label('street', 'Street:') !!}
                {!! Form::text('street', $address->street, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('number', 'Number:') !!}
                {!! Form::text('number', $address->number, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('bus', 'Bus number:') !!}
                {!! Form::text('bus',$address->bus, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('city', 'City:') !!}
                {!! Form::text('city', $address->city, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('postal_code', 'Postal Code:') !!}
                {!! Form::text('postal_code',$address->postal_code, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('country', 'Country:') !!}
                {!! Form::text('country', $address->country, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Update User', ['class'=>'btn btn-primary col-md-6']) !!}
            </div>
            {!! Form::close() !!}
            {!! Form::open(['method'=>'DELETE', 'action'=>['AdminUsersController@destroy', $user->id]]) !!}
            <div class="form-group">
                {!! Form::submit('Delete User', ['class'=>'btn btn-danger col-md-6']) !!}
            </div>
            {!!Form::close() !!}
            </div>
    </div>
    @include('includes.form_error')
@stop
