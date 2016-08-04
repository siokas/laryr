<?php

use Siokas\Laryr\Laryr;

$path = Config::get('laryr.path');
$filename = Config::get('laryr.filename');
$fullpath = $path . '/' . $filename;

$laryr = new Laryr($fullpath);

$routes = $laryr->getRoutesFromYaml();

foreach ($routes as $route) {
    if (isset($route['method']) && $route['method'] == 'group') {
        $groupPath = $path . '/' . $route['name'] . '.yml';
        $group = new Laryr($groupPath);
        $groupRoutes = $group->getRoutesFromYaml();

        Route::group([
            'as' => isset($route['name']) ? $route['name'] : str_random(10),
            'middleware' => isset($route['middleware']) ? $route['middleware'] : 'web',
            'namespace' => isset($route['namespace']) ? $route['namespace'] : '',
            'doamin' => isset($route['doamin']) ? $route['doamin'] : '',
            'prefix' => isset($route['prefix']) ? $route['prefix'] : '',
        ], function () use ($groupRoutes) {
            foreach ($groupRoutes as $groupRoute) {
                $method = isset($groupRoute['method']) ? $groupRoute['method'] : 'get';
                $function = isset($groupRoute['function']) ? $groupRoute['function'] : 'index';

                Route::${"method"}($groupRoute['route'], [
                    'as' => isset($groupRoute['name']) ? $groupRoute['name'] : str_random(10),
                    'uses' => 'App\Http\Controllers\\' . $groupRoute['controller'] . '@' . $function,
                    'middleware' => isset($groupRoute['middleware']) ? $groupRoute['middleware'] : 'web',
                ]);
            }
        });
    } elseif (isset($route['route']) && isset($route['controller'])) {
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
