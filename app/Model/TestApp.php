<?php
App::uses('AppModel', 'Model');
/**
 * TestApp Model
 *
 */
class TestApp extends AppModel {

	public function getData() {
		$total = $this->TestApp->find('count');
		//print_r($total);
	}

}
