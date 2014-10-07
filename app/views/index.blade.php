@extends('templates.master')

@section('content')
    {{ Form::open(['route' => 'add']) }}

        <div class="form__feild-set">
            {{ Form::label('body', 'An awkward situation you have been in') }}
            {{ Form::text('body', Input::old('body'), ['placeholder'=>'I soiled myself whilst writing this']) }}
        </div>
        {{ Form::submit('Add') }}
    {{ Form::close() }}

    <div class="feed">

        @forelse($situations as $situation)
            <article class="item">
                <header class="item__header">
                    <h2 class="item__heading">{{ $situation->user->username }}</h2>
                    <img src="{{ $situation->user->gravatar() }}" alt="{{ $situation->user->username }}" />
                    <ul class="item__meta">
                        <li>{{ $situation->created_at }}</li>
                        <li>{{ $situation->upvotes }}</li>
                        <li>{{ $situation->downvotes }}</li>
                    </ul>
                </header>
                <div class="item__content">
                    {{ $situation->body }}
                </div>
            </article>
        @empty()
            <div class="message--warning">
                <h2>Well, this is awkward...</h2>
                <p>No one's posted anything yet.</p>
            </div>
        @endforelse()

    </div>

@stop
