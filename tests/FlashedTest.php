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

use Gocanto\Flashed\Flash;
use Gocanto\Flashed\Makeups\Config;

class FlashedTest extends TestCase
{
	public function test_set_danger_flash_message_with_a_default_title()
    {
    	Flash::make()->message([
            'body' => 'this a danger message.'
        ]);

        $flash = $this->app->make(\Gocanto\Flashed\Flash::class);

 		$this->assertTrue($flash->exists());
 		$this->assertFalse($flash->hasErrors());
 		$this->assertEquals($flash->type, 'danger');
        $this->assertEquals($flash->title, Config::errorTitle());
        $this->assertEquals($flash->icon, 'fa fa-times-circle-o');
 		$this->assertEquals($flash->body, 'this a danger message.');
    }

    public function test_set_info_flash_message()
    {
    	Flash::make('info')->message([
            'title' => 'The info title',
            'body' => 'this a info message.'
        ]);

        $flash = $this->app->make(\Gocanto\Flashed\Flash::class);

 		$this->assertTrue($flash->exists());
 		$this->assertFalse($flash->hasErrors());
 		$this->assertEquals($flash->type, 'info');
        $this->assertEquals($flash->title, 'The info title');
        $this->assertEquals($flash->icon, 'fa fa-info-circle');
 		$this->assertEquals($flash->body, 'this a info message.');
    }
}