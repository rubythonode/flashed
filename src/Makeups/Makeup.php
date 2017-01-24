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

class Makeup
{
	/**
	 * The make allowed drivers.
	 *
	 * @var array
	 */
	protected $drivers = [
		'bootstrap' => Bootstrap::class
	];

	/**
	 * The makeup driver.
	 *
	 * @var string
	 */
	protected $driver = '';

	public function __construct()
	{
		$this->driver = 'bootstrap';
	}

	/**
	 * Creates a new makeup
	 *
	 * @param  string $type
	 * @return string|RuntimeException
	 */
	public static function make(string $type, $section)
	{
		$makeup = new static();

		if ($makeup->isBuildable()) {
			$builder = $makeup->drivers[$makeup->driver];
			return $builder::build($type, $section);
		}

		throw new RuntimeException("The driver (" . $makeup->driver .") is not valid or allowed." . PHP_EOL);
	}

	/**
	 * Checks whether a given driver is valid.
	 *
	 * @param  string $driver
	 * @return boolean
	 */
	protected function isBuildable() : bool
	{
		return array_key_exists($this->driver, $this->drivers);
	}
}