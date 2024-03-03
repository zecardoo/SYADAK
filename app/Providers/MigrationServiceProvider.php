<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Event;

class MigrationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot()
    {
        Event::listen('Illuminate\Database\Events\Migrations\Migrating', function () {
            $this->app->make(\Database\Seeders\DatabaseSeeder::class)->run();
        });
    }
}