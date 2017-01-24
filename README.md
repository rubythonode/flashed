# Flashed

Flashed is a tiny solution to deal with the flash session in Laravel. Its aim is to keeping simple and driver based messages styling in your views, controllers, repositories, etc.


# Getting started

First of all, you will have to specify the configuration option you wish to have for working with this package. So far, the package was made to work with Twitter bootstrap, but you can modify this to work with any CSS styling you might need.

Second of all, you will have to publish the vendor files shipped within this package. Like so,

```php
php artisan vendor:publish --tag=flashed-it
```

After running this command, you will be able to see the partial view shipped with the packages, and the configuration file. Being the second one the most important file in order for the Flashed library to work properly. Also, you will find a good explanation about what each of the configuration options are about. You can take a look at them clicking on <a href="https://github.com/gocanto/flashed/blob/master/config/flashedit.php" _target="blank">here</a>.
