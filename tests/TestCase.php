<?php

/*
 * This file is part of the Flashed package.
 *
 * (c) Gustavo Ocanto <gustavoocanto@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gocanto\Flashed\Tests;

use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    /**
     * Setup the test environment
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('flashed.driver', 'bootstrap');
        $app['config']->set('flashed.error_title', 'errors.whoops.title');
        $app['config']->set('flashed.makeup', [
            'panelClass' => [
                'primary' => 'panel-primary',
                'success' => 'panel-success',
                'warning' => 'panel-warning',
                'danger' => 'panel-danger',
                'info' => 'panel-info',
            ],
            'icon' => [
                'primary' => 'fa fa-check-square-o',
                'success' => 'fa fa-check-square-o',
                'danger' => 'fa fa-times-circle-o',
                'info' => 'fa fa-info-circle',
                'warning' => 'fa fa-warning',
            ]
        ]);
    }

    /**
     * Get package service providers.
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [\Gocanto\Flashed\FlashedServiceProvider::class];
    }
}