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

use Gocanto\Flashed\Makeups\Makeup;
use Orchestra\Testbench\TestCase as Orchestra;

class MakeupTest extends TestCase
{
	public function test_builds_a_new_makeup_for_a_danger_panel()
	{
		$makeup = Makeup::make('danger', 'panelClass');

		$this->assertTrue(is_string($makeup));
		$this->assertEquals($makeup, 'panel-danger');
	}
}