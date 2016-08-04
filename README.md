# Laryr (Laravel Yaml Routes)

[![Latest Stable Version](https://poser.pugx.org/siokas/laryr/v/stable)](https://packagist.org/packages/siokas/laryr)
[![StyleCI](https://styleci.io/repos/64726308/shield)](https://styleci.io/repos/64726308)

This package helps Laravel users to add routes easily. There will be a yaml on your project in which you have the option to specify the routes. Currently the package provides functionality for simple routes and group routes. The plan for a future update is to include more complex routes with where statements.

The package supports functionality for:
- Routes with all methods (get, post, put, patch, delete, resource)
- Route Name
- Middleware
- (new) Route Groups

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

__Note 1:__ If you want to change the name and the path of the __routes.yml__ file, you have to specify the new path and filename in the config/laryr.php file.

__Note 2:__ Nested functions are not supported on the yaml file.

To create a route group you have to add a route with method as __group__ and name your route.

``` yml
-
  method: group
  name: groupRoutes

```

Then you have to create a .yml file in the same directory with the __routes.yml__ file. This file has to have the same name that you spesified in the previous step. To create that file, open the terminal and type the make artisan command:

``` bash
php artisan make:yaml groupRoutes
```

In this file you can specify the routes you want in the same way.

## Options

There are two options in the routes which are listed below:

``` yml
  name: routeName
  middleware: auth
```

For the route groups there are more available options to specify:

``` yml
  name: test
  domain: {account}.app.dev
  prefix: user
  namespace: UsersAccount
```

## Tutorial

The following link contains a nice fully tutorial on how to use the package to your project:
[https://www.siokas.com/post/laryr/](https://www.siokas.com/post/laryr/) 

## Libraries

- [Symfony/Yaml](https://github.com/symfony/yaml) 

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
