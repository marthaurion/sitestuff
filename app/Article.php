<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Article extends Model {

	protected $fillable = [
		'title',
		'body',
        'excerpt',
		'published_at',
		'user_id',
		'cat_id'
	];

	protected $dates = ['published_at'];

    /**
     * Scope to filter only posts that are meant to be published before current time.
     *
     * @param $query
     */
	public function scopePublished($query)
	{
		$query->where('published_at', '<=', Carbon::now());
	}

    /**
     * Parse input date to create a Carbon object.
     *
     * @param $date
     */
	public function setPublishedAtAttribute($date)
	{
		$this->attributes['published_at'] = Carbon::parse($date);
	}

    /**
     * Format date attribute as datetime string for display.
     *
     * @param $date
     * @return string
     */
	public function getPublishedAtAttribute($date)
	{
		return Carbon::parse($date)->format('Y-m-d\TH:i');
	}

    /**
     * When we're creating a new post and setting the title attribute,
     * set a slug based on the title.
     *
     * @param $title
     */
	public function setTitleAttribute($title)
	{
		$this->attributes['title'] = $title;

		if(!$this->slug) {
			$this->attributes['slug'] = str_slug($title);
		}
	}

    /**
     * Eloquent relationship between Articles and Users (Many to One)
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
	public function author()
	{
		return $this->belongsTo('App\User', 'user_id', 'id');
	}

    /**
     * Eloquent relationship between Articles and Categories (Many to One)
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
	public function category()
	{
		return $this->belongsTo('App\Category', 'cat_id', 'id');
	}

    /**
     * Eloquent relationship between Articles and Tags (Many to Many)
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
	public function tags()
	{
		return $this->belongsToMany('App\Tag');
	}

    /**
     * Create a tag_list attribute to return IDs for tags on a post.
     *
     * @return mixed
     */
	public function getTagListAttribute()
	{
		return $this->tags->lists('id');
	}

    /**
     * Get only the comments for this article without a parent (highest level).
     *
     * @return mixed
     */
    public function topLevelComments()
    {
        return Comment::where('approved', '=', true)->where('article_id', '=', $this->id)->whereNull('parent')->oldest()->get();
    }

    public function approvedComments()
    {
        return $this->comments()->where('approved', '=', true)->get();
    }

    /**
     * Eloquent relationship between Articles and Comments (One to Many)
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany('App\Comment', 'article_id', 'id');
    }

    public function media()
    {
        return $this->hasMany('App\Media', 'article_id', 'id');
    }

    public function firstImage()
    {
        return $this->media->first();
    }
}
