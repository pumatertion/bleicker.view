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
	 * @var string
	 */
	protected $controllerName;

	/**
	 * @var string
	 */
	protected $methodName;

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

	/**
	 * @param string $methodName
	 * @return $this
	 */
	public function setMethodName($methodName) {
		$this->methodName = $methodName;
		return $this;
	}

	/**
	 * @param string $controllerName
	 * @return $this
	 */
	public function setControllerName($controllerName) {
		$this->controllerName = $controllerName;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getMethodName() {
		return $this->methodName;
	}

	/**
	 * @return string
	 */
	public function getControllerName() {
		return $this->controllerName;
	}
}
