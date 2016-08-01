<?php

use Siokas\Laryr\Laryr;

$path = Config::get('laryr.path');

// Create an instance of the Laryr object passing the path of the yml file
$laryr = new Laryr($path);

// Get the routes from the yaml file
$routes = $laryr->getRoutesFromYaml();

// Run through all routes
foreach ($routes as $route) {

    if (isset($route['route']) && isset($route['controller'])) {
        $method = isset($route['method']) ? $route['method'] : 'get';
        $function = isset($route['function']) ? $route['function'] : 'index';

        Route::${"method"}($route['route'], [
            'as' => isset($route['name']) ? $route['name'] : str_random(10),
            'uses' => 'App\Http\Controllers\\' . $route['controller'] . '@' . $function,
            'middleware' => isset($route['middleware']) ? $route['middleware'] : 'web',
        ]);
    } else {
        abort(406, 'You have an error in the ' . $path . ' file. You must declare the route and the controller in the .yml file.');
    }

}
