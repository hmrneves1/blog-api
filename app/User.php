<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail as MustVerifyEmailAlias;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Activitylog\Traits\LogsActivity;
use Rennokki\QueryCache\Traits\QueryCacheable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable implements MustVerifyEmailAlias
{
    use Notifiable, HasApiTokens;

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
     * Invalidate the cache automatically if the model gets an Create, Update or Delete
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
    protected static $logName = "Users";

    /**
     * Model Table Name
     */
    protected $table = 'tbl_users';

    /**
     * Model Primary Key
     */
    protected $primaryKey = 'user_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'user_name', 'email', 'password', 'avatar', 'bio', 'group_id', 'pw_reset_token', 'pw_reset_token_expiration'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'pw_reset_token', 'pw_reset_token_expiration'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Returns the group of an user
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function group()
    {
        return $this->hasOne('App\Models\Api\v1\Users\UserGroup', 'group_id', 'group_id');
    }

    /**
     * Returns all posts associated to an user
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany('App\Models\Api\v1\Posts\Posts', 'user_id', 'user_id');
    }

    /**
     * Returns all comments associated to an user
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany('App\Models\Api\v1\Comments\PostsComments', 'user_id', 'user_id');
    }

    /**
     * Returns all pending posts for the given user
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pending_posts()
    {
        return $this->hasMany('App\Models\Api\v1\Posts\PendingPosts', 'user_id', 'user_id');
    }

    /**
     * Returns all pending comments for the given user
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pending_comments()
    {
        return $this->hasMany('App\Api\v1\Comments\PendingComments', 'user_id', 'user_id');
    }
}
