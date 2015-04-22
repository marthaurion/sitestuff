<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Mail;
use App\Http\Requests\ContactRequest;

class PagesController extends Controller {

	public function about()
	{
		return view('pages.about');
	}

	public function contact()
	{
		return view('pages.contact');
	}

    public function sendContact(ContactRequest $request)
    {
        session()->flash('flash_message', 'I promise your message was actually sent');

        Mail::send('emails.contact',
            array(
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'user_message' => $request->get('message')
            ), function($message)
        {
            $message->to('marthaurion@gmail.com', 'Admin')->subject('Testing Feedback');
        });

        return redirect('/contact');
    }
}
