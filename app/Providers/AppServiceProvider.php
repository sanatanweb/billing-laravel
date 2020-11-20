<?php

namespace App\Providers;

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
        // Interface and Repository binding.
        $this->app->bind('App\Repositories\Base\BaseInterface','App\Repositories\Base\BaseRepository');
        $this->app->bind('App\Repositories\Item\ItemInterface','App\Repositories\Item\ItemRepository');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
