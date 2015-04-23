<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Comment;

class AdminController extends Controller {

    public function __construct()
    {
        $this->middleware('super');
    }

    /**
     * Main page for admin page
     */
	public function index()
    {
        $modded = Comment::where('approved', '=', false)->count();

        return view('admin.dashboard', compact('modded'));
    }

    /**
     * Category creation page
     */
    public function categories()
    {
        //
    }

    /**
     * Log viewing page
     */
    public function logs()
    {
        //
    }

    /**
     * Comment moderation page
     */
    public function comments()
    {
        $comments = Comment::where('approved', '=', false)->oldest()->get();

        return view('admin.comments', compact('comments'));
    }

    public function approve($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->approved = true;
        $comment->save();

        return redirect('/admin/comments');
    }

}
