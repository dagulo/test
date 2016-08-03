<?php

namespace Dagulo\Threedays;

use Illuminate\Support\ServiceProvider;

class ThreedaysServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/views' => base_path('resources/views/dagulo/threedays'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        include __DIR__.'/routes.php';
        $this->app->make('\Dagulo\Threedays\TdaysFrontController');
    }
}
