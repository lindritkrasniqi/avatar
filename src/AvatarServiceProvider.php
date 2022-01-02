<?php

namespace lindritkrasniqi\Avatar;

use Illuminate\Support\ServiceProvider;
use lindritkrasniqi\Avatar\Contracts\Avatar as AvatarContract;
use lindritkrasniqi\Avatar\Services\Avatar;

class AvatarServiceProvider extends ServiceProvider
{
     /**
     * Boot the application.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadMigrationsFrom(__DIR__ . "/../database/migragions");
    }

    /**
     * Register dependecies.
     *
     * @return void
     */
    public function register()
    {
        $this->publishLaravelAssets();

        $this->app->bind(AvatarContract::class, Avatar::class);
    }

    /**
     * Publish laravel assets method.
     *
     * @return void
     */
    private function publishLaravelAssets()
    {
        $this->publishes([
            __DIR__ . "/../config/avatar.php" => config_path('avatar.php'),
            __DIR__ . "/../database/migrations/2022_01_02_000000_create_avatars_table.php" => database_path('migrations/2022_01_02_000000_create_avatars_table.php')
        ], 'laravel-assets');
    }
}
