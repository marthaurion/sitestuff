<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Auth;

class CommentRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
        if(Auth::check()) {
            return [ 'body' => 'required' ];
        }
        else {
            return [
                'username' => 'required',
                'email' => 'required',
                'body' => 'required',
            ];
        }
	}

}
