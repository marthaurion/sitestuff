<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {

	protected $fillable = [
        'body',
        'parent',
        'article_id',
        'user_id',
    ];

    /**
     * Get the parent of a given comment.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parentComment()
    {
        return $this->belongsTo('App\Comment', 'parent', 'id');
    }

    /**
     * Get a collection of children for a given comment.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children()
    {
        return $this->hasMany('App\Comment', 'parent', 'id');
    }

    /**
     * Get the article for the given comment.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function article()
    {
        return $this->belongsTo('App\Article', 'article_id', 'id');
    }

    /**
     * Get the user who created a given comment.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

}
