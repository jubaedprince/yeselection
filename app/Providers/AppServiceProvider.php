<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Voter;
use App\Key;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Voter::created(function($voter)
        {
            Key::createKey($voter);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
