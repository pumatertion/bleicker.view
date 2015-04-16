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
	 * @return ViewInterface
	 */
	public function resolve() {
		return new View();
	}
}
