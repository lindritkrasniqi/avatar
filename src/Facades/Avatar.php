<?php

namespace lindritkrasniqi\Avatar\Facades;

use Illuminate\Support\Facades\Facade;
use lindritkrasniqi\Avatar\Contracts\Avatar as AvatarContract;

/**
 * @method static \lindritkrasniqi\Avatar\Contracts\Avatar of(\App\Models\User $user)
 * @method static void store(\Illuminate\Http\UploadedFile $file)
 * @method static void update(\Illuminate\Http\UploadedFile $file)
 * @method static void destroy()
 * @method static bool delete(string $avatar)
 * 
 * @source \lindritkrasniqi\Avatar\Contracts\Avatar
 */
class Avatar extends Facade
{
    public static function getFacadeAccessor()
    {
        return AvatarContract::class;
    }
}
