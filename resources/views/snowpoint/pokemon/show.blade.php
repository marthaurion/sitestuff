@extends('snowpoint')

@section('content')
    <h4>Content for {{ $pokemon[0]->name }}</h4>

    <h4>Moves</h4>

    <table>
        <tr>
            <th>Name</th>
            <th>Type</th>
            <th>Damage Class</th>
            <th>Effect</th>
        </tr>
    @foreach($moves as $move)
        <tr>
            <td>{{ $move->name }}</td>
            <td>{{ $move->type }}</td>
            <td>{{ $move->damage_type }}</td>
            <td>{{ $move->effect_text }}</td>
        </tr>
    @endforeach
    </table>
@stop