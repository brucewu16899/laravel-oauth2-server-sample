@extends('layouts.default')

@section('content')
{{ Form::open() }}
{{ Form::text('email', '', ['placeholder' => 'email']) }}
{{ Form::password('password', ['placeholder' => 'password']) }}
{{ Form::submit() }}
{{ Form::close() }}
@stop
