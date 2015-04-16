<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {

	protected $fillable = [ 'name', 'slug' ];

    /**
     * Get all articles with a given tag.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
	public function articles()
	{
		return $this->belongsToMany('App\Article', 'article_tag');
	}

}
