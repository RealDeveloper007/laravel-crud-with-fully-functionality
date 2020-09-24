<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\SchoolRepository;
use App\Service\SchoolClass;


class SchoolServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(SchoolRepository::class, SchoolClass::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
