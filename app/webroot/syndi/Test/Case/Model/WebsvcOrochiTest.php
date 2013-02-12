<?php
App::uses('WebsvcOrochi', 'Model');

/**
 * WebsvcOrochi Test Case
 *
 */
class WebsvcOrochiTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.websvc_orochi'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->WebsvcOrochi = ClassRegistry::init('WebsvcOrochi');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->WebsvcOrochi);

		parent::tearDown();
	}

}
