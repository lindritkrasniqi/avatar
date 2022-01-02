<?php

namespace lindritkrasniqi\Avatar\Traits;

use lindritkrasniqi\Avatar\Avatar as AvatarModel;

trait Avatar
{
    /**
     * Avatar one-to-one relationship.
     *
     * @return void
     */
    public function avatar()
    {
        return $this->hasOne(AvatarModel::class);
    }

    /**
     * avatarFileName accessor method.
     *
     * @return string
     */
    public function getAvatarFileName()
    {
        return $this->avatar->name . '.' . $this->avatar->extension;
    }

    /**
     * avatarURL accessor method.
     *
     * @return string
     */
    public function getAvatarURL()
    {
        return url('storage/' . config('avatar.directory') . '/' . $this->getAvatarFileName());
    }
}
