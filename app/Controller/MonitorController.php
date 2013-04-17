<?php

class MonitorController extends AppController {
	
	public $uses = array('Monitor','MonitorExport');

	public function index() {
	}
	
	public function monitor() {
		$this->render('monitor');
	}
	
	public function jsonList() {
		if(isset($this->request->params['category'])) {
			$category 	= $this->request->params['category'];
			$monitor = $this->Monitor->searchData($category);
		}
		else {
			$monitor = $this->Monitor->getMonitor();
		}
		$this->set('monitor', $monitor);
	}
	
	/*public function jsonSearch() {
		$category 	= $this->request->params['category'];
		$event = $this->Monitor->searchData($category);
		$this->set('monitor', $event);
	}*/
	
	public function jsonEvent() {
		$category 	= $this->request->params['category'];
		$event = $this->Monitor->getEvent($category);
		$this->set('monitor', $event);
	}

	public function jsonVisits() {
		$visits = $this->Monitor->getVisits();
		$this->set('visits', $visits);
	}
	
	/**
	* POST data router
	*/
	public function post() {
		if($this->request->data['route']) {
			$route		= $this->request->data['route'];
			unset($this->request->data['route']);
			$response	= $this->$route($this->request->data);
			$this->set('post', $response);
		}
	}
	
	public function monitorExport($data) {
		$this->MonitorExport->export($data);
	}
	
}
