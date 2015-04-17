<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model {

    protected $fillable = [
        'folder',
        'name',
        'article_id'
    ];

    public function getPathAttribute()
    {
        return '/'.$this->folder.'/'.$this->name;
    }

    /**
     * Get the article for the given media item.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function article()
    {
        return $this->belongsTo('App\Article', 'article_id', 'id');
    }

}
