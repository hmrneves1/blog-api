<?php

namespace App\Models\Api\v1\Comments;

use Illuminate\Database\Eloquent\Model;
use Rennokki\QueryCache\Traits\QueryCacheable;
use Spatie\Activitylog\Traits\LogsActivity;

class PostsComments extends Model
{
    /**
     * Rennokki\QueryCache\Traits\QueryCacheable
     */
    use QueryCacheable;

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
    protected static $logName = "Posts Comments";

    /**
     * Model Table Name
     */
    protected $table = 'tbl_posts_comments';

    /**
     * Model Primary Key
     */
    protected $primaryKey = 'comment_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'post_id', 'user_id', 'comment', 'parent_id', 'approved'
    ];

    /**
     * Returns the comment author
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo('App\User', 'user_id', 'user_id');
    }

    /**
     * Returns the post associated to a comment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function post()
    {
        return $this->belongsTo('App\Models\Posts\Posts', 'post_id', 'post_id')->with('author');
    }

    /**
     * Returns the replies to a single comment
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comment_replies()
    {
        return $this->hasMany('App\Models\Api\v1\Comments\PostsComments', 'parent_id', 'comment_id');
    }
}

