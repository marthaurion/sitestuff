<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class SnowpointController extends Controller {

    public function index()
    {
        return view('snowpoint.index');
    }

    public function chat()
    {
        return view('snowpoint.chat');
    }

    public function contact()
    {
        return view('snowpoint.contact')->with('users', ['Ghostbusters', 'Marth', 'West', 'That Guy']);
    }

}
