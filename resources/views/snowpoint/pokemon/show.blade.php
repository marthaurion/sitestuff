@extends('snowpoint')

@section('content')
    @foreach($pokemon as $poke)
        <h3>Information for {{ $poke->ex_name }}</h3>

        <h4>Abilities</h4>
        <ul>
        @foreach($poke->abilities as $ability)
            <li>
                @if($ability->hidden)
                    Hidden: 
                @endif
                {{ $ability->name }}
            </li>
        @endforeach
        </ul>

        <div id="stats">
            <h4>Stats</h4>
            <table class="table">
                <tr><td>HP:</td><td>{{ $poke->hp }}</td></tr>
                <tr><td>Attack:</td><td>{{ $poke->attack }}</td></tr>
                <tr><td>Defense:</td><td>{{ $poke->defense }}</td></tr>
                <tr><td>Special Attack:</td><td>{{ $poke->special_attack }}</td></tr>
                <tr><td>Special Defense:</td><td>{{ $poke->special_defense }}</td></tr>
                <tr><td>Speed:</td><td>{{ $poke->speed }}</td></tr>
            </table>
        </div>
    @endforeach

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