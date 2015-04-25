@extends('snowpoint')

@section('content')
    <h4>All the things</h4>

    <ul>
        @foreach( $pokemon as $poke )
            <a href="{{ route('pokemon.show', $poke->spec_id) }}"><li>{{ $poke->name }}</li></a>
        @endforeach
    </ul>
@stop