<?php

class MonitorController extends AppController {
	
	public $uses = array('Monitor');

	public function index() {

	}
	
	public function monitor() {
		$this->render('monitor');
	}
	
	public function monitorlist() {
		$monitor = $this->Monitor->getMonitor();
		$this->set('monitor', serialize($monitor));
	}
	
	public function visits() {
		$monitor = $this->Monitor->getMonitor();
		$this->set('monitor', serialize($monitor));
	}
	

}
