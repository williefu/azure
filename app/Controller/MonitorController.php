<?php

class MonitorController extends AppController {
	
	public $uses = array('Monitor','OriginAd');

	public function index() {
	}
	
	public function monitor_list() {
		$this->render('monitor_list');
	}
	
	public function monitor_actions() {
		$actions['category_id'] = $this->request->params['id'];
		$actions['startDate'] 	= $this->request->params['start'];
		$actions['endDate'] 	= $this->request->params['end'];
		
		$origin		= $this->OriginAd->find('first', 
			array(
				'recursive'=>2,
				'conditions'=>array(
					'OriginAd.id'=>$actions['category_id']
				)
			)
		);
		$actions['category'] = $origin['OriginAd']['name'];
		
		$this->set('actions', $actions);
		$this->render('monitor_actions');
	}
	
	public function monitor_actions1() {
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
		$data['start_date'] = $this->request->params['start_date'];
		$data['end_date']	= $this->request->params['end_date'];
		$data['category']	= $this->request->params['category'];
		
		$action = $this->Monitor->getEventAction($data);
		$label = $this->Monitor->getEventLabel($data);
		
		$this->set('action', $action);
		$this->set('label', $label);
		$this->set('category', $data['category']);
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
		$data['template'] = $this->request->params['template'];
		$this->set('category', $data['category']);
		$this->set('template', $data['template']);
		
		switch($data['template']) {
			case 0: 
					$monitor = $this->Monitor->getMonitor();
					$this->set('monitor',$monitor);
					break;
			case 1: 
					$monitor = $this->Monitor->searchData($data);
					$this->set('monitor',$monitor);
					break;
			case 2:
					$data['category'] = $this->request->params['category'];
					$action = $this->Monitor->getEventAction($data);
					$label = $this->Monitor->getEventLabel($data);
				
					$this->set('action', $action);
					$this->set('label', $label);
					break;
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
