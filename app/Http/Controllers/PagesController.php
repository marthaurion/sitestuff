<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PagesController extends Controller {

	public function about()
	{
		return view('pages.about');
	}

	public function contact()
	{
		return view('pages.contact');
	}

    public function sendContact()
    {
        session()->flash('flash_message', 'I promise your message was actually sent');
        return redirect('/contact');
    }
}
