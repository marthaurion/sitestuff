<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use Auth;
use App\User;
use App\Article;

class CommentsController extends Controller {

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CommentRequest $request)
	{
        $this->createComment($request);

        session()->flash('flash_message', 'Your comment has been posted!');
        return redirect(route('articles.show', Article::find($request['article_id'])->slug));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

    private function createComment(CommentRequest $request)
    {
        if(Auth::check()) {
            $article = Auth::user()->comments()->create($request->all());
        }
        else {
            $user = User::where('email', '=', $request['email'])->first();
            if(empty($user)){
                $user = User::create(['email' => $request['email'], 'username' => $request['username']]);
            }
            $article = $user->comments()->create($request->all());
        }

        return $article;
    }

}
