<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use DB;

class PokedexController extends Controller {

    public function index()
    {
        DB::table('pokemon')->get();
        return 'Meh';
    }

    public function show($id)
    {
        $pokemon = DB::table('pokemon')->where('species_id', $id)
            ->join('pokemon_species', 'pokemon.species_id', '=', 'pokemon_species.spec_id')
            ->get();

        if(count($pokemon) < 1) abort(404);

        $first_one = $pokemon[0]->pokemon_id;
        $moves = DB::table('pokemon_moves_r')->where('poke_id', $first_one)
            ->join('pokemon_moves', 'pokemon_moves_r.move_id', '=', 'pokemon_moves.move_id')
            ->join('pokemon_move_methods', 'pokemon_moves_r.move_method', '=', 'pokemon_move_methods.move_method_id')
            ->join('pokemon_types', 'pokemon_moves.type_id', '=', 'pokemon_types.type_id')
            ->select('pokemon_types.name as type', 'pokemon_moves.name', 'effect_text', 'effect_chance', 'move_method_text', 'damage_type')
            ->orderBy('pokemon_moves_r.poke_id')->orderBy('pokemon_moves_r.move_method')
            ->get();

        return view('snowpoint.pokemon.show', compact('pokemon', 'moves'));
    }

}