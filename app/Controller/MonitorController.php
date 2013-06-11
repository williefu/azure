<?php

class MonitorController extends AppController {
	
	public $uses = array('Monitor');

	public function index() {
	}
	
	public function monitor_list() {
		$this->render('monitor_list');
	}
	
	public function monitor_actions() {
		$category = $this->request->params['id'];
		$this->set('category', $category);
		$this->render('monitor_actions');
	}
	
	public function jsonList() {
		if(isset($this->request->params['start_date'])) {
			$data['start_date'] 	= $this->request->params['start_date']!='undefined' ? $this->request->params['start_date']:date('Y-m-d',strtotime('-31 day'));
			$data['end_date'] 	= $this->request->params['end_date']!='undefined' ? $this->request->params['end_date']:date("Y-m-d",strtotime('-1 day'));
			$data['category'] 	= $this->request->params['category']!='undefined' ? $this->request->params['category']:'';
			$monitor = $this->Monitor->searchData($data);
		}
		else {
			$monitor = $this->Monitor->getMonitor();
		}
		$this->set('monitor', $monitor);
	}

	public function jsonEvent() {
		$category 	= $this->request->params['category'];
		$action = $this->Monitor->getEventAction($category);
		$label = $this->Monitor->getEventLabel($category);
		
		$this->set('action', $action);
		$this->set('label', $label);
		$this->set('category', $category);
	}

	public function jsonVisits() {
		if(isset($this->request->params['start_date'])) {
			$data['start_date'] = $this->request->params['start_date']!='undefined' ? $this->request->params['start_date']:date('Y-m-d',strtotime('-31 day'));
			$data['end_date'] 	= $this->request->params['end_date']!='undefined' ? $this->request->params['end_date']:date("Y-m-d",strtotime('-1 day'));
			$data['category'] 	= $this->request->params['category']!='undefined' ? $this->request->params['category']:'';
			$visits = $this->Monitor->getVisitsData($data);
		}
		else {
			$visits = $this->Monitor->getVisits();
		}
		$this->set('visits', $visits);
	}
	
	public function export_xls() {
		$data['category'] = $this->request->params['category'];
		$data['start_date'] = $this->request->params['start'];
		$data['end_date'] = $this->request->params['end'];
				
		if($data['category']=="ALL") {
			$monitor = $this->Monitor->getMonitor();
			$this->set('monitor',$monitor);
			$this->set('category', 'ALL');
		}
		else {
			$action = $this->Monitor->getEventAction($data['category']);
			$label = $this->Monitor->getEventLabel($data['category']);
		
			$this->set('action', $action);
			$this->set('label', $label);
			$this->set('category', $data['category']);
		}
		
		$this->render('export_xls','export_xls');
	}
	
	
	public function post() {
		if($this->request->data['route']) {
			$route		= $this->request->data['route'];
			unset($this->request->data['route']);
			$response	= $this->$route($this->request->data);
			$this->set('post', $response);
			//$this->set('data', $this->request->data);
		}
	}
}
