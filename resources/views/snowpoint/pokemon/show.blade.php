@extends('snowpoint')

@section('content')
    <h4>Content for {{ $pokemon[0]->name }}</h4>

    <h5>Moves</h5>

    <table class="table table-striped table-hover">
        <tr>
            <th>Name</th>
            <th>Type</th>
            <th>Damage Class</th>
            <th>Move Method</th>
            <th>Effect</th>
        </tr>
    @foreach($moves as $move)
        <tr>
            <td>{{ $move->name }}</td>
            <td>{{ $move->type }}</td>
            <td>{{ $move->damage_type }}</td>
            <td>{{ $move->move_method_text }}</td>
            <td>{{ $move->effect_text }}</td>
        </tr>
    @endforeach
    </table>
@stop