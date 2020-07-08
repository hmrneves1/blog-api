<?php

namespace App\Models\Api\v1\Posts;

use Illuminate\Database\Eloquent\Model;
use Rennokki\QueryCache\Traits\QueryCacheable;
use Spatie\Activitylog\Traits\LogsActivity;
use Cviebrock\EloquentSluggable\Sluggable;

class Posts extends Model
{
    /**
     * Rennokki\QueryCache\Traits\QueryCacheable
     */
    use QueryCacheable;

    /**
     * Cviebrock\EloquentSluggable\Sluggable
     */
    use Sluggable;

    /**
     * Rennokki\QueryCache\Traits\QueryCacheable
     *
     * Duration in seconds of the cache life
     */
    //public $cacheFor = 86400;

    /**
     * Rennokki\QueryCache\Traits\QueryCacheable
     *
     * Invalidate the cache automatically
     * upon update in the database.
     */
    //protected static $flushCacheOnUpdate = true;

    /**
     * Spatie\Activitylog\Traits\LogsActivity
     */
    use LogsActivity;

    /**
     * Spatie\Activitylog\Traits\LogsActivity
     *
     * This will log every field from fillable array
     */
    protected static $logFillable = true;

    /**
     * Spatie\Activitylog\Traits\LogsActivity
     *
     * This will log every field from guarded array
     */
    protected static $logUnguarded = true;

    /**
     * Spatie\Activitylog\Traits\LogsActivity
     *
     * Defines the log name
     */
    protected static $logName = "Posts";

    /**
     * Model Table Name
     */
    protected $table = 'tbl_posts';

    /**
     * Model Primary Key
     */
    protected $primaryKey = 'post_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'title', 'body', 'image', 'slug',
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    /**
     * Returns the post author
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo('App\User', 'user_id', 'user_id');
    }

    /**
     * Returns all categories associated to a post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany('App\Models\Api\v1\Categories\Categories', 'posts_hasmany_categories', 'post_id', 'category_id');
    }

    /**
     * Returns all comments associate to a post
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany('App\Models\Api\v1\Comments\PostsComments', 'post_id', 'post_id');
    }
}
