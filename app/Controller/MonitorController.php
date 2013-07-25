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
		$actions['category'] 	= $this->getTitle($actions['category_id']);
		
		$this->set('actions', $actions);
		$this->render('monitor_actions');
	}
	
	public function getTitle($category_id) {
		$origin		= $this->OriginAd->find('first', 
			array(
				'recursive'=>2,
				'conditions'=>array(
					'OriginAd.id'=>$category_id
				)
			)
		);
		$title = $origin['OriginAd']['name'];
	
		return $title;
	}
		
	public function jsonList() {
		if(isset($this->request->params['start_date'])) {
			$data['start_date'] = $this->request->params['start_date']!='undefined' ? $this->request->params['start_date']:date('Y-m-d',strtotime('-31 day'));
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
		$this->getData();
		$this->render('export_xls','xls');
	}
	
	public function export_pdf() {
		//create image
		$this->getData();
		$this->render('export_pdf','pdf');
	}
	
	public function getData() {
		if(isset($this->request->params['category'])) {
			$data['category'] = $this->request->params['category'];
			$data['start_date'] = $this->request->params['start'];
			$data['end_date'] = $this->request->params['end'];
			$data['template'] = $this->request->params['template'];
			
			$this->set('template', $data['template']);
			
			switch($data['template']) {
				case 0: 
					$this->set('category', $data['category']);
					$monitor = $this->Monitor->searchData($data);
					$this->set('monitor',$monitor);
					break;
				case 1:
					$this->set('category', $this->getTitle($data['category']));
					$action = $this->Monitor->getEventAction($data);
					$label = $this->Monitor->getEventLabel($data);
				
					$this->set('action', $action);
					$this->set('label', $label);
					//build monitor obj
					$index = 0;
					foreach($action->data as $key=>$item) {
						$index++;
						$monitor[$index]->event = $key;
						$monitor[$index]->totalEvents = $item->{"ga:totalEvents"};
						$monitor[$index]->uniqueEvents = $item->{"ga:uniqueEvents"};

						if(isset($label->data)) {
							$i = 0;
							$monitorLabel = array();
							foreach($label->data as $event=>$value) {
								if($event==$key) {
									foreach($value as $label1=>$value) {
										$i++;
										$monitorLabel[$i]->label = $label1;
										$monitorLabel[$i]->totalEvents = $value->{"ga:totalEvents"};
										$monitorLabel[$i]->uniqueEvents = $value->{"ga:uniqueEvents"};
									}
								}
							}
							$monitor[$index]->labels = $monitorLabel;		
						}
					}
					$this->set('monitor',$monitor);
					break;
			}
		}
		else {
			$monitor = $this->Monitor->getMonitor();
			$this->set('monitor',$monitor);
		}
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
