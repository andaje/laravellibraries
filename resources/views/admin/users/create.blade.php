@extends('layouts.admin')
@section('content')
    <h1>Create User</h1>
    {!! Form::open(['method'=>'POST', 'action'=>'AdminUsersController@store','files'=>true]) !!}
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
        {!! Form::select('role_id', [''=>'Choose options'] + $roles,null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('is_active', 'Status:') !!}
        {!! Form::select('is_active', array(1=>'Active', 0=>'Not Active'),0, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('password', 'Password:') !!}
        {!! Form::password('password', ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('street', 'Street:') !!}
        {!! Form::text('street', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('number', 'Number:') !!}
        {!! Form::text('number', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('bus', 'Bus:') !!}
        {!! Form::text('bus', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('city', 'City:') !!}
        {!! Form::text('city', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('postal_code', 'Postal Code:') !!}
        {!! Form::text('postal_code', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('country', 'Country:') !!}
        {!! Form::text('country', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Create User', ['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
    @include('includes.form_error')
@stop
