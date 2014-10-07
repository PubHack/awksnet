@extends('templates.master')

@section('content')

    @if($errors->any())
        <ul class="message--error">
            @foreach($errors as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif()

    {{ Form::open(['route' => 'signup']) }}

        <div class="form__feild-set">
            {{ Form::label('username', 'Username') }}
            {{ Form::text('username', Input::old('username'), ['placeholder'=>'awkwardturtle69']) }}
        </div>

        <div class="form__feild-set">
            {{ Form::label('email', 'Email') }}
            {{ Form::email('email', Input::old('email'), ['placeholder'=>'lovestospooge@gmail.com']) }}
        </div>

        <div class="form__feild-set">
            {{ Form::label('password', 'Password') }}
            {{ Form::password('password') }}
        </div>

        <div class="form__feild-set">
            {{ Form::label('password_confirmation', 'Confirm password') }}
            {{ Form::password('password_confirmation') }}
        </div>

        <div class="form__feild-set">
            {{ Form::label('city', 'City') }}
            {{ Form::text('city') }}
        </div>

        {{ Form::submit('Join the NSA mailing list') }}

    {{ Form::close() }}

@stop
