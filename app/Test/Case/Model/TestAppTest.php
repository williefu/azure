<?php
App::uses('TestApp', 'Model');

/**
 * TestApp Test Case
 *
 */
class TestAppTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.test_app',
		'app.article',
		'app.test_apps_article'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->TestApp = ClassRegistry::init('TestApp');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TestApp);

		parent::tearDown();
	}

}
