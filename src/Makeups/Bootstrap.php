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

use Illuminate\Support\Collection;

class Bootstrap implements Agreement
{
	/**
	 * The styles array.
	 *
	 * @var Illuminate\Support\Collection
	 */
	protected $styles = null;

	/**
	 * The style section.
	 *
	 * @var string
	 */
	protected $section = '';

	/**
	 * The flash message type.
	 *
	 * @var string
	 */
	protected $type = '';

	/**
	 * Creates a new instance.
	 *
	 * @param string $type
	 * @param string $section
	 */
	public function __construct(string $type, string $section)
	{
		$this->type = $type;
		$this->section = $section;
		$this->styles = Config::driverMakeup();
	}

	/**
	 * Builds a class name for a given type and section.
	 *
	 * @param  string $type
	 * @param  string $section
	 * @return string
	 */
	public static function build(string $type, string $section) : string
	{
		$bootstrap = new static($type, $section);

		return $bootstrap->retrieve();
	}

	/**
	 * Retrieves the class name.
	 *
	 * @return string
	 */
	public function retrieve() : string
	{
		if ($this->styles->has($this->section)) {
			return $this->resolveClassName();
		}

		return '';
	}

	/**
	 * Resolves the class name for the given type and section.
	 *
	 * @return string
	 */
	protected function resolveClassName() : string
	{
		$className = $this->getSection()->get($this->type);

		return is_null($className) ? '' : $className;
	}

	/**
	 * Gets the styles section.
	 *
	 * @return Collection
	 */
	protected function getSection() : Collection
	{
		return Collection::make($this->styles->get($this->section));
	}
}