<?php

namespace Bleicker\View;

use Bleicker\View\Html\View;

/**
 * Class ViewResolver
 *
 * @package Bleicker\View
 */
class ViewResolver extends AbstractViewResolver {

	/**
	 * @return string
	 */
	public function resolve() {
		return new View($this->controllerName, $this->methodName);
	}

}
