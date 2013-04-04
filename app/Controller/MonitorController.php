<?php

class MonitorController extends AppController {
	
	public $uses = array('Monitor');

	public function index() {
	}
	
	public function monitor() {
		$this->render('monitor');
	}
	
	public function jsonList() {
		$monitor = $this->Monitor->getMonitor();
		$this->set('monitor', $monitor);
	}
	
	public function jsonVisits() {
		$visits = $this->Monitor->getVisits();
		$this->set('visits', $visits);
	}
	

}
