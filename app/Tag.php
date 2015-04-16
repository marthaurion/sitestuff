<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {

	protected $fillable = [ 'name', 'slug' ];

    /**
     * When setting the title, create a slug from the title
     *
     * @param $name
     */
    public function setNameAttribute($name)
    {
        $this->attributes['name'] = $name;

        if(!$this->slug)
        {
            $this->attributes['slug'] = str_slug($name);
        }
    }

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
