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

use RuntimeException;
use Illuminate\Support\Collection;
use Illuminate\Container\Container;

class Config
{
	public static function driver()
	{
		return self::fetch('driver');
	}

	/**
	 * Returns the driver make up styles.
	 *
	 * @return RuntimeException|Collection
	 */
	public static function driverMakeup() : Collection
	{
		$makeup = self::fetch('makeup');

		if (empty($makeup)) {
			throw new RuntimeException("The driver makeup is not valid or allowed." . PHP_EOL);
		}

		return Collection::make($makeup);
	}

	/**
	 * Returns the default title for an error message.
	 *
	 * @return string
	 */
	public static function errorTitle()
	{
		$title = self::fetch('error_title');

		return \Lang::get(is_null($title) ? 'NotOk' : $title);
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

		return Container::getInstance()->make('config')->get('flashed' . $key);
	}
}