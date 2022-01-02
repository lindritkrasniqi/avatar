<?php

return [
    /*
     |--------------------------------------------------------------------------
     | Avatar Storege Disk
     |--------------------------------------------------------------------------
     |
     | The storage disk which the avatar files going to be stored.
     |
     | Supported: "public"
     |
     */

    'disk' => env('AVATAR_DISK', 'public'),

    /*
     |--------------------------------------------------------------------------
     | Avatar Directory Path
     |--------------------------------------------------------------------------
     |
     | The directory of the avatars. The default is avatars.
     |
     | Supported: "*"
     |
     */

    'directory' => env('AVATAR_DIR', 'avatars'),

    /*
     |--------------------------------------------------------------------------
     | Avatar Defaults
     |--------------------------------------------------------------------------
     |
     | The avatar defaults values.
     |
     */

    'defaults' => [
        'size' => env('AVATAR_SIZE', 150),
    ]
];
