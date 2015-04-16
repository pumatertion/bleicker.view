<?php

namespace Bleicker\View;

use ArrayObject as Storage;

/**
 * Class AbstractView
 *
 * @package Bleicker\View
 */
abstract class AbstractView implements ViewInterface {

	/**
	 * @var Storage
	 */
	protected $storage;

	public function __construct() {
		$this->storage = new Storage();
	}

	/**
	 * @param string $name
	 * @param mixed $value
	 * @return $this
	 */
	public function assign($name, $value) {
		$this->storage->offsetSet($name, $value);
		return $this;
	}

	/**
	 * @param $name
	 * @return mixed
	 */
	public function get($name) {
		if ($this->storage->offsetExists($name)) {
			return $this->storage->offsetGet($name);
		}
	}

}
