# Flashed

[![Latest Version on Packagist](https://img.shields.io/packagist/v/gocanto/flashed.svg?style=flat-square)](https://img.shields.io/packagist/v/gocanto/flashed.svg)
<a href="https://github.com/gocanto/flashed/blob/master/LICENSE"><img src="https://img.shields.io/npm/l/easiest-js-validator.svg" alt="License"></a>
[![Total Downloads](https://img.shields.io/packagist/dt/gocanto/flashed.svg?style=flat-square)](https://img.shields.io/packagist/dt/gocanto/flashed.svg?style=flat-square)


Flashed is a tiny solution to deal with the flash session in Laravel. Its aim is to keeping simple and driver based messages styling in your views, controllers, repositories, etc.


# Getting started

***First of all***, you have to install the package through Composer running the following command in your terminal:

```bash
composer require gocanto/flashed
```


Once composer is done, add the package service provider in the providers array in `config/app.php`:

```php
Gocanto\Flashed\FlashedServiceProvider::class,
```

***Second of all***, you will have to publish the vendor files shipped within this package. As so,

```bash
php artisan vendor:publish --tag=flashed-it
```


***Third of all***, you will have to specify the configuration option you wish to have for working with this package. So far, the package was made to work with Twitter bootstrap, but you can modify this to work with any CSS styling you might need.


After running this command, you will be able to see the partial view shipped with the packages, and the configuration file. Being the second one the most important file in order for the Flashed library to work properly. 

You will find a good explanation about what each of the configuration options are about. You can take a look at them clicking on <a href="https://github.com/gocanto/flashed/blob/master/config/flashedit.php" _target="blank">here</a>.


# How it to implement it in your controllers

You have to import he flash class, as so: 

```php
use Gocanto\Flashed\Flash;
```

Then, you can use its ```static``` method to create a new flash message, as so:

```php
Flash::make()->message([
  'title' => 'Hi There!',
  'body' => 'this is the body'
]);
```

The title and body are optional, so you do not have to pass both to the make method. If you do not pass a title, the default one will be used instead. 

Also, you will have the ability to create five different flash messages, for examples: 'primary', 'success', 'warning', 'danger' and 'info'. You only need to invoke them like so:

```php
Flash::make('info')->message([
  'title' => 'This is a info message!',
  'body' => 'this is the body'
]);
```

***Note:*** By default, the message type is ```danger```


# The view shipped out


The views included with this package can be imported like so,

```php
@include ('vendor.flashedit.messages')
```

And it was created to work with the default driver which is ```twitter bootstrap```


# Contributing

Please feel free to fork this package and contribute by submitting a pull request to enhance the functionalities.


# License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

Don't forget to [follow me on twitter](https://twitter.com/gocanto)!

Thanks!

Gustavo Ocanto.
gustavoocanto@gmail.com











