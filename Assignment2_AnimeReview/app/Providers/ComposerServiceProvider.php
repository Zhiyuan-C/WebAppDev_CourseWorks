<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Studio;
class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // get list of studios to display into master
        view()->composer('layouts.master', function($view){
            $view->with('studios', Studio::all());
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
