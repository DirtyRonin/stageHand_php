<?php

namespace App\Providers;

use Flat3\Lodata\Facades\Lodata;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Lodata::discoverEloquentModel(\App\Models\Product::class);
        // Lodata::discoverEloquentModel(\App\Models\Song::class);
    }
}
