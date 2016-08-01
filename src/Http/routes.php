<?php

use Siokas\Laryr\Laryr;

$laryr = new Laryr();

$routes = $laryr->getRoutesFromYaml();

foreach ($routes as $route) {

    if (isset($route['method'])) {
        $method = $route['method'];
        Route::${"method"}($route['route'], [
            'as' => isset($route['name']) ? $route['name'] : str_random(10),
            'uses' => 'App\Http\Controllers\\' . $route['controller'] . '@' . $route['function'],
            'middleware' => isset($route['middleware']) ? $route['middleware'] : 'web',
        ]);
    }
}
