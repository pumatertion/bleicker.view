<?php

namespace Tests\Bleicker\View\Unit;

use Bleicker\View\Template\View;
use Tests\Bleicker\View\Fixtures\Foo\Bar\FooController;
use Tests\Bleicker\View\UnitTestCase;

/**
 * Class ContentTest
 *
 * @package Tests\Bleicker\View\Unit
 */
class ContentTest extends UnitTestCase {

	/**
	 * @test
	 */
	public function templatePathsTest() {
		$view = new View(FooController::class, 'dummy');
		$expectedDirectory = realpath(__DIR__ . '/..');
		$this->assertEquals($expectedDirectory . DIRECTORY_SEPARATOR . 'Templates', $view->getTemplateView()->getTemplatePaths()->getTemplateRootPaths()['test']);
		$this->assertEquals($expectedDirectory . DIRECTORY_SEPARATOR . 'Layouts', $view->getTemplateView()->getTemplatePaths()->getLayoutRootPaths()['test']);
		$this->assertEquals($expectedDirectory . DIRECTORY_SEPARATOR . 'Partials', $view->getTemplateView()->getTemplatePaths()->getPartialRootPaths()['test']);
	}

	/**
	 * @test
	 */
	public function contextTest() {
		$view = new View(FooController::class, 'dummy');
		$this->assertEquals('dummy', $view->getTemplateView()->getRenderingContext()->getControllerAction());
		$this->assertEquals('Tests'.DIRECTORY_SEPARATOR.'Bleicker'.DIRECTORY_SEPARATOR.'View'.DIRECTORY_SEPARATOR.'Fixtures'.DIRECTORY_SEPARATOR.'Foo'.DIRECTORY_SEPARATOR.'Bar'.DIRECTORY_SEPARATOR.'FooController', $view->getTemplateView()->getRenderingContext()->getControllerName());
	}
}
