# Laryr (Laravel Yaml Routes)

[![Software License][ico-license]](LICENSE.md)

This package helps Laravel users to add easy and quick simple routes to its app. There will be a yaml on your project in which you have the option to specify the routes. Currently the package provides functionality only for simple routes and planing for a future update to also include route groups and more complex routes with where statements.

The package supports functionality for:
- Routes with all methods (get, post, put, patch, delete, resource)
- Route Name
- Middleware

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

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email :author_email instead of using the issue tracker.

## Libraries

- [Symfony/Yaml](https://github.com/symfony/yaml) 

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/:vendor/:package_name.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/:vendor/:package_name/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/:vendor/:package_name.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/:vendor/:package_name.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/:vendor/:package_name.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/:vendor/:package_name
[link-travis]: https://travis-ci.org/:vendor/:package_name
[link-scrutinizer]: https://scrutinizer-ci.com/g/:vendor/:package_name/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/:vendor/:package_name
[link-downloads]: https://packagist.org/packages/:vendor/:package_name
[link-author]: https://github.com/:author_username
[link-contributors]: ../../contributors
