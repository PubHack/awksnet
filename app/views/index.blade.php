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

                <div class="vote-graph">
                    <div class="vote-graph__upvotes" style="width: {{ $situation->percentageUpvotes() }}%;"></div>
                    <div class="vote-graph__downvotes" style="width: {{ $situation->percentageDownvotes() }}%;"></div>
                </div>

                <div class="item__inner-wrap">
                    <img class="item__image" src="{{ $situation->user->gravatar() }}" alt="{{ $situation->user->username }}" />
                    <div class="item__content">
                        <header class="item__header">
                            <h2 class="item__heading">{{ $situation->user->username }}</h2>
                            <ul class="item__meta">
                                <li>{{ $situation->created_at }}</li>
                            </ul>
                        </header>
                        <div class="item__body">
                            {{ $situation->body }}
                        </div>
                    </div>
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
