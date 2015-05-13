<?php

namespace Bleicker\View\Template;

use Bleicker\ObjectManager\ObjectManager;
use Bleicker\Registry\Registry;
use Bleicker\View\AbstractView;
use TYPO3\Fluid\Core\Cache\FluidCacheInterface;
use TYPO3\Fluid\Core\Rendering\RenderingContext;
use TYPO3\Fluid\Core\Variables\StandardVariableProvider;
use TYPO3\Fluid\Core\ViewHelper\ViewHelperVariableContainer;
use TYPO3\Fluid\View\TemplatePaths;
use TYPO3\Fluid\View\TemplateView;

/**
 * Class View
 *
 * @package Bleicker\View\Template
 */
class View extends AbstractView {

	/**
	 * @var TemplateView
	 */
	protected $fluid;

	/**
	 * @param string $className
	 * @param string $methodName
	 * @param string $format
	 */
	public function __construct($className, $methodName, $format = 'html') {
		$context = new RenderingContext();
		$context->setControllerName($this->ensureControllerNameIsDirectoryPath($className));
		$context->setControllerAction($methodName);
		$context->setVariableProvider(new StandardVariableProvider());
		$context->injectViewHelperVariableContainer(new ViewHelperVariableContainer());

		$paths = new TemplatePaths();
		$paths->setTemplateRootPaths((array)Registry::get('paths.typo3.fluid.templateRootPaths'));
		$paths->setLayoutRootPaths((array)Registry::get('paths.typo3.fluid.layoutRootPaths'));
		$paths->setPartialRootPaths((array)Registry::get('paths.typo3.fluid.partialRootPaths'));
		$paths->setFormat($format);

		$this->fluid = new TemplateView($paths, $context);

		if (ObjectManager::has(FluidCacheInterface::class)) {
			$this->fluid->setCache(ObjectManager::get(FluidCacheInterface::class));
		}
	}

	/**
	 * @param $controllerName
	 * @return string
	 */
	protected function ensureControllerNameIsDirectoryPath($controllerName) {
		return str_ireplace('\\', DIRECTORY_SEPARATOR, $controllerName);
	}

	/**
	 * @return TemplateView
	 */
	public function getTemplateView(){
		return $this->fluid;
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
	 * @param array $values
	 * @return $this
	 */
	public function assignMultiple(array $values) {
		$this->fluid->assignMultiple($values);
		return $this;
	}

	/**
	 * @return string
	 */
	public function render() {
		return $this->fluid->render();
	}
}
