<?php

/*
 * This file is part of the Flashed package.
 *
 * (c) Gustavo Ocanto <gustavoocanto@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gocanto\Flashed;

use Illuminate\Support\ServiceProvider;

class FlashedServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishFlashedResources();
        }
    }
    /**
     * Publish the Flashed resources files.
     *
     * @return void
     */
    protected function publishFlashedResources()
    {
        $this->publishes([
            __DIR__ . '/../config/' => config_path()
        ], 'flashed-it');

         $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/flashedit'),
        ], 'flashed-it');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['flashed-it'];
    }
}