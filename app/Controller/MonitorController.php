<?php

class MonitorController extends AppController {
	
	public $uses = array('Monitor','OriginAd');

	public function index() {
	}
	
	public function monitor_list() {
		$this->render('monitor_list');
	}
	
	public function monitor_actions() {
		$actions['category_id'] = $this->request->params['id'];//[Origin ID: XXX]
		$actions['startDate'] 	= $this->request->params['start'];
		$actions['endDate'] 	= $this->request->params['end'];
		
		$origin_id = substr($actions['category_id'], 11, -1);
		$actions['category'] 	= $this->getTitle($origin_id);
		
		$this->set('actions', $actions);
		$this->render('monitor_actions');
	}
	
	public function getTitle($origin_id) {
		$origin		= $this->OriginAd->find('first', 
			array(
				'recursive'=>2,
				'conditions'=>array(
					'OriginAd.id'=>$origin_id
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
		$monitor = $this->Monitor->getMonitor();
		$this->set('monitor',$monitor);
		$this->render('export_xls','xls');
	}
	
	public function export_xls_data() {
		$data['category'] = $this->request->params['category'];
		$data['start_date'] = $this->request->params['start'];
		$data['end_date'] = $this->request->params['end'];
		
		$this->set('category', $data['category']);
		$monitor = $this->Monitor->searchData($data);
		$this->set('monitor',$monitor);
		$this->render('export_xls','xls');
	}
	
	public function export_xls_events() {
		$data['category'] = $this->request->params['category'];
		$data['start_date'] = $this->request->params['start'];
		$data['end_date'] = $this->request->params['end'];
		
		$origin_id = substr($data['category'], 11, -1);
		$this->set('category', $this->getTitle($origin_id));
		$action = $this->Monitor->getEventAction($data);
		$label = $this->Monitor->getEventLabel($data);
				
		$this->set('action', $action);
		$this->set('label', $label);
		//build events obj
		$index = 0;
		foreach($action->data as $key=>$item) {
			$index++;
			$events[$index]->event = $key;
			$events[$index]->totalEvents = $item->{"ga:totalEvents"};
			$events[$index]->uniqueEvents = $item->{"ga:uniqueEvents"};

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
				$events[$index]->labels = $monitorLabel;		
			}
		}
		$this->set('events',$events);
		$this->render('export_xls','xls');			
	}
	
	public function export_pdf() {
		//create image
		$monitor = $this->Monitor->getMonitor();
		$this->set('monitor',$monitor);
		$this->render('export_pdf','pdf');
	}
	
	public function export_pdf_data() {
		$data['category'] = $this->request->params['category'];
		$data['start_date'] = $this->request->params['start'];
		$data['end_date'] = $this->request->params['end'];
		
		$this->set('category', $data['category']);
		$monitor = $this->Monitor->searchData($data);
		$this->set('monitor',$monitor);
		$this->render('export_pdf','pdf');
	}
	
	public function export_pdf_events() {
		$data['category'] = $this->request->params['category'];
		$data['start_date'] = $this->request->params['start'];
		$data['end_date'] = $this->request->params['end'];
		
		$origin_id = substr($data['category'], 11, -1);
		$this->set('category', $this->getTitle($origin_id));
		$action = $this->Monitor->getEventAction($data);
		$label = $this->Monitor->getEventLabel($data);
				
		$this->set('action', $action);
		$this->set('label', $label);
		//build events obj
		$index = 0;
		foreach($action->data as $key=>$item) {
			$index++;
			$events[$index]->event = $key;
			$events[$index]->totalEvents = $item->{"ga:totalEvents"};
			$events[$index]->uniqueEvents = $item->{"ga:uniqueEvents"};

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
				$events[$index]->labels = $monitorLabel;		
			}
		}
		$this->set('events',$events);
		$this->render('export_pdf','pdf');
	}
	
	public function jsonAccount() { 
		$account_id = $this->request->params['account'];
		$data = $this->Monitor->pullAccountData($account_id);
		$this->set('account',$data);
	}
}
