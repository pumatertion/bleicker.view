<?php

namespace Bleicker\View\Html;

use Bleicker\Framework\WebApplication;
use Bleicker\View\AbstractView;
use TYPO3\Fluid\Core\Rendering\RenderingContext;
use TYPO3\Fluid\Core\Variables\StandardVariableProvider;
use TYPO3\Fluid\Core\ViewHelper\ViewHelperVariableContainer;
use TYPO3\Fluid\View\TemplatePaths;
use TYPO3\Fluid\View\TemplateView;
use TYPO3\Fluid\Core\Cache\FluidCacheInterface;

/**
 * Class View
 *
 * @package Bleicker\View\Html
 */
class View extends AbstractView {

	/**
	 * @var TemplateView
	 */
	protected $fluid;

	/**
	 * @param string $controllerName
	 * @param string $methodName
	 */
	public function __construct($controllerName, $methodName) {
		$context = new RenderingContext();
		$context->setControllerName($this->ensureControllerNameIsDirectoryPath($controllerName));
		$context->setControllerAction($methodName);
		$context->setVariableProvider(new StandardVariableProvider());
		$context->injectViewHelperVariableContainer(new ViewHelperVariableContainer());

		$paths = new TemplatePaths();
		$paths->setTemplateRootPaths(array(
			ROOT_DIRECTORY . '/Templates'
		));
		$paths->setLayoutRootPaths(array(
			ROOT_DIRECTORY . '/Templates/Layouts'
		));
		$paths->setPartialRootPaths(array(
			ROOT_DIRECTORY . '/Templates/Partials'
		));

		$this->fluid = new TemplateView($paths, $context);

		$cache = WebApplication::getRegistry()->getImplementation(FluidCacheInterface::class);
		if($cache !== NULL){
			$this->fluid->setCache($cache);
		}
	}

	/**
	 * @param $controllerName
	 * @return string
	 */
	protected function ensureControllerNameIsDirectoryPath($controllerName) {
		return DIRECTORY_SEPARATOR . str_ireplace('\\', DIRECTORY_SEPARATOR, $controllerName);
	}

	/**
	 * @param string $name
	 * @param mixed $value
	 * @return $this
	 */
	public function assign($name, $value) {
		$this->fluid->assign($name, $value);
		return $this;
	}

	/**
	 * @return string
	 */
	public function render() {
		return $this->fluid->render();
	}
}
