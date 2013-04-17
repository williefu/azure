<?php
App::uses('AppModel', 'Model');
/**
 * Monitor Model
 *
 */
class Monitor extends AppModel {

	/*
    * Function that returns the event category list of the past 30 days
    */
    function getMonitor() {
		$end_date = date("Y-m-d",strtotime('-1 day'));
		$start_date = date('Y-m-d',strtotime('-31 day')); 
		$dimensions = 'ga:eventCategory';
		$metrics = 'ga:totalEvents,ga:uniqueEvents';
		$sort = '-ga:totalEvents';
		$monitor = json_decode($this->pullAnalyticsData($dimensions, $metrics, $sort, $start_date, $end_date, true, false));
		return $monitor;
    }
	
	function getVisits() {
		$end_date = date("Y-m-d",strtotime('-1 day'));
		$start_date = date('Y-m-d',strtotime('-31 day')); 
		$dimensions = 'ga:date';
		$metrics = 'ga:visits';
		$sort = 'ga:date';
		$visits = json_decode($this->pullAnalyticsData($dimensions, $metrics, $sort, $start_date, $end_date, true, false));
		return $visits;
    }
	
	function getEvent($data) { //print_r($data);
		$end_date = date("Y-m-d",strtotime('-1 day'));
		$start_date = date('Y-m-d',strtotime('-31 day')); 
		$dimensions = 'ga:eventAction';
		$metrics = 'ga:totalEvents,ga:uniqueEvents';
		$sort = '-ga:totalEvents';
		$filters = $data;
		//$filters = new analytics_filters('ga:eventCategory','=@','Assassins Creed [Horizon - DO NOT MODIFY]');
		$monitor = json_decode($this->pullAnalyticsData($dimensions, $metrics, $sort, $start_date, $end_date, true, $filters));
		
		return $monitor;
	}
	
	function pullAnalyticsData($dimensions=false, $metrics, $sort, $start_date, $end_date, $save=false, $filters=false) {
		//Google count
		$login = '';
		//si-tech@gorillanation.com
		$password = '';

		//Table Id of  webservices
		$id = 'ga:26782196';
		
		App::import('Vendor', 'ga_api');
		
		$api = new analytics_api();
		
		if($api->login($login, $password)) { 
			if(true) {
					if($filters) {
						$filters = new analytics_filters('ga:eventCategory','=@',$filters);
					}
					$data = $api->data($id, $dimensions, $metrics, $sort, $start_date, $end_date, 500, 1, $filters);
					
					if($metrics!="visits") {
						$total = $api->data($id, '', $metrics, '', $start_date, $end_date, 1, 1, $filters);
						
						$analyticsData = array();
						
						$total['start_date'] = $start_date;
						$total['end_date'] = $end_date;
						
						$analyticsData['totals'] = $total;   
						$analyticsData['data'] = $data;     
						
						$jsonData = json_encode($analyticsData);
					}
					else {
						$analyticsData['visits'] = $data;
						$jsonData = json_encode($analyticsData);
					}
					return $jsonData;
			}
		}
		else {
			return false;
		}
	}
}
