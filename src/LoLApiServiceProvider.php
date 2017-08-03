<?php

namespace Naoray\LoLApi;

use Illuminate\Support\ServiceProvider;

class LoLApiServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    	//
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/lolapi-core.php', 'lolapi');
    }
}
