<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['username', 'email', 'password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token', 'super'];

    /**
     * All articles written by a given user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
	public function articles ()
	{
		return $this->hasMany('App\Article', 'user_id', 'id');
	}

    /**
     * All comments written by a given user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany('App\Comment', 'user_id', 'id');
    }

    /**
     * For determining create and edit privileges.
     *
     * @return bool
     */
    public function isSuper()
    {
        return ($this->super == 1);
    }
}
