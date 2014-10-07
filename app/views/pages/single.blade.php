@extends('templates.master')

@section('content')

    <div class="feed">
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
    </div>

@stop
