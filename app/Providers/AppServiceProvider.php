<?php

namespace App\Providers;

use App\Models\Hotels;
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
        $hotels=Hotels::all();
        view()->composer('*', function($view) use($hotels) {
            $view->with('hotels', $hotels);
        });
    }
}
