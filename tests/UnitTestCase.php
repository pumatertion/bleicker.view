<?php

namespace Tests\Bleicker\View;

use Bleicker\Registry\Registry;

/**
 * Class UnitTestCase
 *
 * @package Tests\Bleicker\View
 */
abstract class UnitTestCase extends BaseTestCase {

	protected function setUp() {
		parent::setUp();
		Registry::set('typo3.fluid.templateRootPaths.test', realpath(__DIR__) . DIRECTORY_SEPARATOR . 'Templates');
		Registry::set('typo3.fluid.layoutRootPaths.test', realpath(__DIR__) . DIRECTORY_SEPARATOR . 'Layouts');
		Registry::set('typo3.fluid.partialRootPaths.test', realpath(__DIR__) . DIRECTORY_SEPARATOR . 'Partials');
	}
}
