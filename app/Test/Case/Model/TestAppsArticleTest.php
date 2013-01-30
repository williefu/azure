<?php
App::uses('TestAppsArticle', 'Model');

/**
 * TestAppsArticle Test Case
 *
 */
class TestAppsArticleTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.test_apps_article',
		'app.test_app',
		'app.article'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->TestAppsArticle = ClassRegistry::init('TestAppsArticle');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TestAppsArticle);

		parent::tearDown();
	}

}
