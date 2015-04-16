<?php

namespace Bleicker\View\Html;

use Bleicker\View\AbstractView;

/**
 * Class View
 *
 * @package Bleicker\View\Html
 */
class View extends AbstractView {

	/**
	 * @return string
	 */
	public function render() {
		return $this->get('title');
	}
}
