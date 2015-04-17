<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Commenter extends Model {

	protected $fillable = ['username', 'email'];

    public function comments()
    {
        return $this->hasMany('App\Comment', 'commenter_id', 'id');
    }

}
