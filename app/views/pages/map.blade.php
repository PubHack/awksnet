@extends('templates.master')

@section('content')

    @if($locations)
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=geometry"></script>
        <script>
            var locations = [
                @forelse($locations as $location)

                        {
                            "city": {{ '"' . $location->city . '"'}},
                            "count": {{ $location->count }},
                            "average": {{ $location->average}}
                        },

                @empty()
                    <h2>No locations brah</h2>
                @endforelse()
            ];
        </script>
        <div id="awkward-map"></div>
    @endif

@stop
