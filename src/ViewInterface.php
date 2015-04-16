<?php

namespace Bleicker\View;

/**
 * Interface ViewInterface
 *
 * @package Bleicker\View
 */
interface ViewInterface {

	/**
	 * @return string
	 */
	public function render();

	/**
	 * @param string $name
	 * @param mixed $value
	 * @return $this
	 */
	public function assign($name, $value);

	/**
	 * @param $name
	 * @return mixed
	 */
	public function get($name);
}
