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

use Illuminate\Support\Collection;
use Illuminate\Container\Container;
use Gocanto\Flashed\Makeups\Makeup;
use Gocanto\Flashed\Makeups\Config;

class Flash
{
    /**
     * The flash message key.
     *
     * @var string
     */
    protected $key = '__flash__';

    /**
     * The flash message type.
     *
     * @var string
     */
	protected $type = '';

    /**
     * The flashed message.
     *
     * @var array
     */
    protected $flash = null;

    /**
     * The laravel session.
     *
     * @var Illuminate\Session\Store
     */
    protected $session = null;

    /**
     * Creates a new instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->session = Container::getInstance()->make('session');

        if ($this->exists()) {
            $this->flash = $this->buildFromKey();
        }

        if ($this->hasErrors()) {
            $this->flash = $this->buildFromErrors();
        }
    }

    /**
     * Checks whether the flash message exists.
     *
     * @return bool
     */
    public function exists() : bool
    {
        return !! $this->session->has($this->key);
    }

    /**
     * Builds the flash message from a given key.
     *
     * @return Collection
     */
    protected function buildFromKey() : Collection
    {
         return Collection::make(
            $this->session->get($this->key)
        );
    }

    /**
     * Checks whether there was any validation error.
     *
     * @return bool
     */
    public function hasErrors() : bool
    {
    	return !! count($this->session->get('errors')) > 0;
    }

    /**
     * Builds the flash message from validation errors.
     *
     * @return Collection
     */
    protected function buildFromErrors() : Collection
    {
    	return Collection::make([
            'body' => $this->session->get('errors')->all(),
            'type' => 'danger',
        ]);
    }

    /**
     * Create a new instance for a given type.
     *
     * @param  string $type
     * @return $this
     */
    public static function make($type = 'danger')
    {
        $flash = new static();
        $flash->type = $type;

        return $flash;
    }

    /**
     * Sets the flash message body.
     *
     * @param  array $data
     * @return $this
     */
    public function message($data)
    {
        $data = array_merge($data, [
            'type' => $this->type
        ]);

        $this->session->flash($this->key, $data);

        return $this;
    }

    /**
     * Returns the flash message identifier.
     *
     * @return string
     */
    protected function type() : string
    {
        return $this->flash['type'] ?? 'info';
    }

    /**
     * Returns a property for a given key.
     *
     * @param  string $section
     * @return Mixed
     */
    public function __get($section)
    {
        if (method_exists($this, $section)) {
            return $this->$section();
        }

        return $this->resolveStyles($section);
    }

    /**
     * Returns the flash message title.
     *
     * @return string
     */
    public function title() : string
    {
        if ($this->flash->has('title')) {
            return $this->flash->get('title');
        }

        return Config::errorTitle();
    }

    /**
     * Returns the flash message title.
     *
     * @return string
     */
    public function body()
    {
        if ($this->flash->has('body')) {
            return $this->flash->get('body');
        }

        return '';
    }

    /**
     * Resolves the flash message style.
     *
     * @param  string $section
     * @return string
     */
    protected function resolveStyles($section) : string
    {
        return  Makeup::make($this->type(), $section);
    }
}