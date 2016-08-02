# Laryr (Laravel Yaml Routes)

[![Latest Stable Version](https://poser.pugx.org/siokas/laryr/v/stable)](https://packagist.org/packages/siokas/laryr)
[![StyleCI](https://styleci.io/repos/64726308/shield)](https://styleci.io/repos/64726308)
[![Software License](LICENSE.md)

This package helps Laravel users to add routes easily. There will be a yaml on your project in which you have the option to specify the routes. Currently the package provides functionality only for simple routes and planing for a future update to also include route groups and more complex routes with where statements.

The package supports functionality for:
- Routes with all methods (get, post, put, patch, delete, resource)
- Route Name
- Middleware

__Note:__ Tested and works fine on Laravel 5.3

## Install

Via Composer

``` bash
composer require siokas/laryr
```

After the installation you should regirster the ServiceProvider to the config/app.php file. Add the following line in the __providers__ array.

``` php
Siokas\Laryr\LaryrServiceProvider::class,
```

Now you should publish the unpublished files. Open terminal and type:

``` bash
php artisan vendor:publish
```

This command will publish a yaml file at the root directory of your app, called __routes.yml__ and a configuration file in config directory called __laryr.php__.

## Usage

Open the __routes.yml__ file and enter your application routes in a collection type. 

``` yml
-
	route: test
	method: get
	controller: AppController
	function: index

```

This will create a route which points to the specified Controller and function.

__Note 1:__ If you want to change the name and the path of the __routes.yml__ file, you have to specify the new path in the config/laryr.php file.

__Note 2:__ Nested functions are not supported on the yaml file.

## Options

There are two options in the routes which are listed below:

``` yml
	name: routeName
	middleware: auth

```

## Libraries

- [Symfony/Yaml](https://github.com/symfony/yaml) 

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
