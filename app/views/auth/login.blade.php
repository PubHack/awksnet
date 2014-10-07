@extends('templates.master')

@section('content')

    {{ Form::open(['url' => '/']) }}

        <div class="form__feild-set">
            {{ Form::label('username', 'Username') }}
            {{ Form::text('username', Input::old('username'), ['placeholder'=>'awkwardturtle69']) }}
        </div>

        <div class="form__feild-set">
            {{ Form::label('password', 'Password') }}
            {{ Form::password('password') }}
        </div>

        {{ Form::submit('Login') }}

    {{ Form::close() }}

@stop
