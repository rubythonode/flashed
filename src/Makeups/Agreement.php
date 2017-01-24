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

interface Agreement
{
	/**
	 * Builds a class name for a given type and section.
	 *
	 * @param  string $type
	 * @param  string $section
	 * @return string
	 */
	public static function build(string $type, string $section) : string;
}