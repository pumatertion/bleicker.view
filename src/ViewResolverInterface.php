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
	 * @return ViewInterface
	 */
	public function resolve();
}
