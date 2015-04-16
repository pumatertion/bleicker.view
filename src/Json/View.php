<?php

namespace Bleicker\View\Json;

use Bleicker\View\AbstractView;

/**
 * Class View
 *
 * @package Bleicker\View\Json
 */
class View extends AbstractView {

	/**
	 * @return string
	 */
	public function render() {
		return json_encode($this->storage);
	}
}
