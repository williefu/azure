<?php

class MonitorController extends AppController {
	
	public $uses = array('Monitor','MonitorExport');

	public function index() {
	}
	
	public function monitor() {
		$this->render('monitor');
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
		//$this->set('monitor', $event);
		$this->set('action', $action);
		$this->set('label', $label);
		$this->set('category', $category);
	}

	public function jsonVisits() {
		if(isset($this->request->params['start_date'])) {
			$data['start_date'] 	= $this->request->params['start_date']!='undefined' ? $this->request->params['start_date']:date('Y-m-d',strtotime('-31 day'));
			$data['end_date'] 	= $this->request->params['end_date']!='undefined' ? $this->request->params['end_date']:date("Y-m-d",strtotime('-1 day'));
			$data['category'] 	= $this->request->params['category']!='undefined' ? $this->request->params['category']:'';
			$visits = $this->Monitor->getVisitsData($data);
		}
		else {
			$visits = $this->Monitor->getVisits();
		}
		$this->set('visits', $visits);
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
	
	public function monitorExport() {
		$this->MonitorExport->export($this->request->data);
		//print_r($this->request->data);
		//$this->set('post', $response);
		/*
		debug($this->request->params['data']['type']);
		//$this->set('data', $this->request->params['data']);
		
		$start = $data['monitor_filter']['startDate'];
				$end = $data['monitor_filter']['endDate'];
				
				ob_start();
				header("Content-type: application/x-msdownload");
				header("Content-Disposition: attachment; filename=extraction.xls");
				header("Pragma: no-cache");
				header("Expires: 0");

				$header = "# ------------------------------------------------------------\n";
				$header.= "# SI Event Category\n";
				$header.= "# Top Events\n";
				$header.= "#". $start ." - ".$end."\n";
				$header.= "# ------------------------------------------------------------\n";
				//$header.= "Event Action\tTotal Events\tUnique Events\tEvent Value\tAvg. Value";
				$info = "Event Category\tTotal Events\tUnique Events\n";
				foreach($data['monitor_list'] as $key=>$row) {
					$info .= $row['category'] . "\t" . $row['totalEvents'] . "\t" . $row['uniqueEvents']. "\n";
				}
				
				print "$header\n$info";*/
	}
	
}
