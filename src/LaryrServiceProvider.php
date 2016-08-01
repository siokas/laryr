<?php

namespace Siokas\Laryr;

use Illuminate\Routing\Router;
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
        // use this if your package has routes
        $this->setupRoutes($this->app->router);

        $this->publishes([
            __DIR__ . '/config/laryr.php' => config_path('laryr.php'),
        ]);

        $this->publishes([
            __DIR__ . '/yaml/routes.yml' => base_path('routes.yml'),
        ]);

    }
    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function setupRoutes(Router $router)
    {
        // $router->group(['namespace' => 'Siokas\Laryr\Http\Controllers'], function ($router) {
        //     require __DIR__ . '/Http/routes.php';
        // });
        require __DIR__ . '/Http/routes.php';
        // $laryr = new Laryr();
    }
    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerLaryr();

        config([
            'config/laryr.php',
        ]);
    }

    private function registerLaryr()
    {
        $this->app->bind('laryr', function ($app) {
            return new Laryr();
        });
    }
}
