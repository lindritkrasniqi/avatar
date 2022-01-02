<?php

namespace lindritkrasniqi\Avatar;

use Illuminate\Database\Eloquent\Model;

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
}
