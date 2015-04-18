<?php

namespace Bleicker\View;

use Bleicker\Request\MainRequestInterface;

/**
 * Interface ViewResolverInterface
 *
 * @package Bleicker\View
 */
interface ViewResolverInterface {

	/**
	 * @return MainRequestInterface
	 */
	public function getRequest();

	/**
	 * @param MainRequestInterface $request
	 * @return $this
	 */
	public function setRequest(MainRequestInterface $request);

	/**
	 * @param string $methodName
	 * @return $this
	 */
	public function setMethodName($methodName);

	/**
	 * @param string $controllerName
	 * @return $this
	 */
	public function setControllerName($controllerName);

	/**
	 * @return string
	 */
	public function getMethodName();

	/**
	 * @return string
	 */
	public function getControllerName();

	/**
	 * @return ViewInterface
	 */
	public function resolve();
}
