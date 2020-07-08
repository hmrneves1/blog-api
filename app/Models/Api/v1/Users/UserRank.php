<?php

namespace App\Models\Api\v1\Users;

use Illuminate\Database\Eloquent\Model;
use Rennokki\QueryCache\Traits\QueryCacheable;
use Spatie\Activitylog\Traits\LogsActivity;

class UserRank extends Model
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
    protected static $logName = "Users Ranks";

    /**
     * Model Table Name
     */
    protected $table = 'tbl_users_ranks';

    /**
     * Model Primary Key
     */
    protected $primaryKey = 'rank_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * Returns all users that belongs to a specific rank
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany('App\User', 'rank_id', 'rank_id');
    }
}
