<?php

/*
 * This file is part of the Flashed package.
 *
 * (c) Gustavo Ocanto <gustavoocanto@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gocanto\Flashed\Makeups;

use Lang;
use RuntimeException;
use Illuminate\Support\Collection;
use Illuminate\Container\Container;

class Config
{
	/**
	 * Returns the driver make up styles.
	 *
	 * @return RuntimeException|Collection
	 */
	public static function driverMakeup() : Collection
	{
		$driver = self::fetch('driver');

		if (empty($driver['makeup'])) {
			throw new RuntimeException("The driver makeup is not valid or allowed." . PHP_EOL);
		}

		return Collection::make($driver['makeup']);
	}

	/**
	 * Returns the default title for an error message.
	 *
	 * @return string
	 */
	public static function errorTitle()
	{
		$title = self::fetch('errors.title');

		return Lang::get(is_null($title) ? 'NotOk' : $title);
	}

	/**
	 * Fetches the configuration data for a given key.
	 *
	 * @param  string $key
	 * @return array|string
	 */
	protected static function fetch($key = '')
	{
		$key = trim($key) != '' ? '.' . $key : '';

		return Container::getInstance()->make('config')->get('flashedit' . $key);
	}
}