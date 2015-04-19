<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use Auth;
use App\User;
use App\Commenter;
use App\Article;

class CommentsController extends Controller {

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CommentRequest $request)
	{
        $comment = $this->createComment($request);

        if($comment->approved) session()->flash('flash_message', 'Your comment has been posted!');
        else session()->flash('flash_message', 'Your comment is in queue for moderation.');

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
        $user = Commenter::where('email', '=', $request['email'])->first();
        if(empty($user)){
            $user = Commenter::create(['email' => $request['email'], 'username' => $request['username']]);
        }

        $request['approved'] = $user->approved;
        if(empty($request['approved'])) $request['approved'] = false;

        $comment = $user->comments()->create($request->all());

        return $comment;
    }

}
