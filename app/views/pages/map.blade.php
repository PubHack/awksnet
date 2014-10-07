@extends('templates.master')

@section('content')

    @forelse($locations as $location)
        {{ var_dump($location) }}
    @empty()
        <h2>No locations brah</h2>
    @endforelse()

@stop
