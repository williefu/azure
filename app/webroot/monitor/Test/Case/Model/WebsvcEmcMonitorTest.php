<?php
App::uses('WebsvcEmcMonitor', 'Model');

/**
 * WebsvcEmcMonitor Test Case
 *
 */
class WebsvcEmcMonitorTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.websvc_emc_monitor'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->WebsvcEmcMonitor = ClassRegistry::init('WebsvcEmcMonitor');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->WebsvcEmcMonitor);

		parent::tearDown();
	}

}
