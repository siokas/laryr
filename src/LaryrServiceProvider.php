<?php

namespace Siokas\Laryr;

use Config;
use Illuminate\Support\ServiceProvider;
use Siokas\Laryr\Laryr;

class LaryrServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        require __DIR__ . '/Http/routes.php';

        $this->publishes([
            __DIR__ . '/config/laryr.php' => config_path('laryr.php'),
        ]);

        $this->publishes([
            __DIR__ . '/yaml/routes.yml' => base_path('routes.yml'),
        ]);

    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        config([
            'config/laryr.php',
        ]);
    }

}
