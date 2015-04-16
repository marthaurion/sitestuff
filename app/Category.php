<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Article;

class Category extends Model {

	protected $fillable = [
		'title',
		'parent',
	];

    /**
     * When setting the title, create a slug from the title
     *
     * @param $title
     */
	public function setTitleAttribute($title)
	{
		$this->attributes['title'] = $title;

		if(!$this->slug)
		{
			$this->attributes['slug'] = str_slug($title);
		}
	}

    /**
     * Allows pulling parent category.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
	public function parentCat()
	{
		return $this->belongsTo('App\Category', 'parent', 'id');
	}

    /**
     * Grab all of the children from a given category.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children()
    {
        return $this->hasMany('App\Category', 'parent', 'id');
    }

    /**
     * Grab all articles for a given category.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
	public function articles()
	{
		return $this->hasMany('App\Article', 'cat_id', 'id');
	}

    /**
     * Enhanced function for querying articles based on a category.
     * Gets all articles with a given category or one of its children.
     *
     * @return mixed
     */
    public function articlesAll()
    {
        $categoryIds = $this->children->lists('id');
        array_push($categoryIds, $this->id);
        return Article::whereIn('cat_id', $categoryIds);
    }

}
