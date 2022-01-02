<?php

namespace lindritkrasniqi\Avatar\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use lindritkrasniqi\Avatar\Avatar;
use lindritkrasniqi\Avatar\Facades\Avatar as FacadesAvatar;

class AvatarDeleted
{
    use Dispatchable, SerializesModels;

    /**
     * Unlink avatar file on deleted hook.
     *
     * @param  Avatar $avatar
     */
    public function __construct(Avatar $avatar)
    {
        FacadesAvatar::delete($avatar->name . '.' . $avatar->extension);
    }
}
