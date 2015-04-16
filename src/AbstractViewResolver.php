<?php

namespace Bleicker\View;

use Bleicker\Request\MainRequestInterface;

/**
 * Class AbstractViewResolver
 *
 * @package Bleicker\View
 */
abstract class AbstractViewResolver implements ViewResolverInterface {

	/**
	 * @var MainRequestInterface
	 */
	protected $request;

	/**
	 * @return MainRequestInterface
	 */
	public function getRequest() {
		return $this->request;
	}

	/**
	 * @param MainRequestInterface $request
	 * @return $this
	 */
	public function setRequest(MainRequestInterface $request) {
		$this->request = $request;
		return $this;
	}
}
