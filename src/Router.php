<?php

namespace Siokas\Laryr;

class Router
{
    private $yamlRoute;

    public function __construct($yamlRoute)
    {
        $this->yamlRoute = $yamlRoute;
    }

    public function getRouteInstance()
    {
        $route = $this->yamlRoute;
        $method = $route['method'];

        return Route::${"method"}($route['route'], [
            'as' => isset($route['name']) ? $route['name'] : str_random(10),
            'uses' => 'App\Http\Controllers\\' . $route['controller'] . '@' . $route['function'],
            'middleware' => isset($route['middleware']) ? $route['middleware'] : 'web',
        ]);
    }
}
