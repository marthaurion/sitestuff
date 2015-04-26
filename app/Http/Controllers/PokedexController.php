<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use DB;

class PokedexController extends Controller {

    public function index()
    {
        $pokemon = DB::table('pokemon_species')->get();
        return view('snowpoint.pokemon.index', compact('pokemon'));
    }

    public function show($id)
    {
        $pokemon = DB::table('pokemon')->where('species_id', $id)
            ->join('pokemon_species', 'pokemon.species_id', '=', 'pokemon_species.spec_id')
            ->get();

        foreach($pokemon as $poke) {
            $ability = DB::table('pokemon_abilities_r')->where('poke_id', $poke->pokemon_id)
                ->join('pokemon_abilities', 'pokemon_abilities_r.ability_id', '=', 'pokemon_abilities.ability_id')
                ->get();

            $poke->abilities = array();
            foreach($ability as $ab) {
                array_push($poke->abilities, $ab);
            }

            if(empty($poke->form_name)) $poke->ex_name = $poke->name;
            else $poke->ex_name = $poke->form_name;
        }

        if(count($pokemon) < 1) abort(404);

        $first_one = $pokemon[0]->pokemon_id;
        $moves = DB::table('pokemon_moves_r')->where('poke_id', $first_one)
            ->join('pokemon_moves', 'pokemon_moves_r.move_id', '=', 'pokemon_moves.move_id')
            ->join('pokemon_move_methods', 'pokemon_moves_r.move_method', '=', 'pokemon_move_methods.move_method_id')
            ->join('pokemon_types', 'pokemon_moves.type_id', '=', 'pokemon_types.type_id')
            ->select('pokemon_types.name as type', 'pokemon_moves.name', 'effect_text', 'effect_chance', 'move_method_text', 'damage_type')
            ->orderBy('pokemon_moves_r.move_method')->orderBy('pokemon_moves.name')
            ->get();

        foreach($moves as $move) {
            if ($move->effect_chance) {
                $move->effect_text = str_replace('$effect_chance', $move->effect_chance, $move->effect_text);
            }
        }

        return view('snowpoint.pokemon.show', compact('pokemon', 'moves'));
    }

}