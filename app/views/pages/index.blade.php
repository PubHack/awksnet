@extends('templates.master')

@section('content')

    @if(isset($user))
    {{ Form::open(['route' => 'add']) }}
        <div class="form__field-set">
            {{ Form::label('body', 'How this works: Type the most awkward thing that you can think of or has happened to you and people will rate how awkward it is') }}
            {{ Form::text('body', Input::old('body'), ['placeholder'=>'Example: I soiled myself whilst writing this']) }}
            {{ Form::submit('Add') }}
        </div>

    {{ Form::close() }}
    @endif

    <div class="feed">

        @forelse($situations as $situation)
            <article class="item">

                <div class="vote-graph">
                    <div class="vote-graph__upvotes" style="width: {{ $situation->percentageUpvotes() }}%;"></div>
                    <div class="vote-graph__downvotes" style="width: {{ $situation->percentageDownvotes() }}%;"></div>
                </div>

                <div class="item__inner-wrap">
                    <img class="item__image" src="{{ $situation->user->gravatar() }}" alt="{{ $situation->user->username }}" />
                    <a href="/voteup/{{ $situation->id }}"><i class="fa fa-caret-up"></i></a>
                    <a href="/votedown/{{ $situation->id }}"><i class="fa fa-caret-down"></i></a>
                    <div class="item__content">
                        <header class="item__header">
                            <h2 class="item__heading"><a href="{{ $situation->link() }}">{{ $situation->user->username }}</a></h2>
                            <ul class="item__meta">
                                <li>{{ (new DateTime($situation->created_at))->format('H:i d-m-Y') }}</li>
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
