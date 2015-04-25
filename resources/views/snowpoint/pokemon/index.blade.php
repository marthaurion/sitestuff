@extends('snowpoint')

@section('content')
    <h4>All the things</h4>

    <ul>
        @foreach( $pokemon as $poke )
            <li><a href="{{ route('pokemon.show', $poke->spec_id) }}">{{ $poke->name }}</a></li>
        @endforeach
    </ul>
@stop