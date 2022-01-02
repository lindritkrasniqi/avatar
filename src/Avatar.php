<?php

namespace lindritkrasniqi\Avatar;

use Illuminate\Database\Eloquent\Model;
use lindritkrasniqi\Avatar\Events\AvatarDeleted;

class Avatar extends Model
{
    /**
     * Fillable properties.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'extension',
        'size'
    ];

    /**
     * Dispatches Events.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'deleted' => AvatarDeleted::class
    ];
}
