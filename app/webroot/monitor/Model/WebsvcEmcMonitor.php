<?php
App::uses('AppModel', 'Model');
//App::uses('Gapi', 'Vendor');
/**
 * WebsvcEmcMonitor Model
 *
 */
class WebsvcEmcMonitor extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'websvc_emc_monitor';

	/*
    * Function that returns the event category list of the past 30 days
    */
    function getMonitor() {
		$end_date = date("Y-m-d",strtotime('-1 day'));
		/*				
		$query = "SELECT * FROM #__emc_monitor ";
		$query .= "WHERE end_date ='{$end_date}'";
		$this->_monitorDB->setQuery($query);
		$todayData = $this->_monitorDB->loadObject();
		if($todayData) {//echo '1';
			$monitor = json_decode($todayData->data);
			//$monitor = $todayData->data;
		}
		else {//echo '2';
			$start_date = date('Y-m-d',strtotime('-31 day')); 
			$monitor = json_decode($this->pullCategoriesData(false, $start_date, $end_date, true, false));
			//$monitor = $this->pullCategoriesData($date);
		}
		return $monitor;
		*/
		//$this->WebsvcEmcMonitor->find('first');
		
		//$monitor = json_decode($this->pullCategoriesData(false, $start_date, $end_date, true, false));
		$start_date = date('Y-m-d',strtotime('-31 day')); 
		$monitor = json_decode($this->pullCategoriesData(false, $start_date, $end_date, true, false));
		return $monitor;
    }
	
	function pullCategoriesData($dimensions=false, $start_date, $end_date, $save=false, $filters=false) {
		//debug(App::Path('vendors') );
		//Google count
		$login = '';
		//si-tech@gorillanation.com
		$password = '';

		//Table Id of  webservices
		$id = 'ga:26782196';
		
		App::import('Vendor', 'ga_api');
		//App::import("Vendor", "analytics_api", false, null, 'ga_api.php');
		//require_once('ga_api.php');
		//App::import('Vendor', 'analytics_api', array('file' =>
//'GA'.DS.'ga_api.php'));
		$api = new analytics_api();
		//if(analytics_api::login($login, $password)) { print_r('in');
		if($api->login($login, $password)) {
			//if($this->isLogin()) {
			if(true) {
				if($filters) {
					//$filters = new analytics_filters('ga:eventCategory','=@','Assassins Creed [Horizon - DO NOT MODIFY]');
					$filters = new analytics_filters('ga:eventCategory','=@',$filters);
				}
				if($dimensions) {
					$data = $api->data($id, $dimensions, 'ga:totalEvents,ga:uniqueEvents', '-ga:totalEvents', $start_date, $end_date, 500, 1, $filters);
				}
				else {
					$data = $api->data($id, 'ga:eventCategory', 'ga:totalEvents,ga:uniqueEvents', '-ga:totalEvents', $start_date, $end_date, 500, 1, $filters);
				}
				//print_r($data);
				//$data = $api->data($id, 'ga:eventCategory,ga:eventAction', 'ga:totalEvents,ga:uniqueEvents', 'ga:eventCategory,-ga:totalEvents', '2012-08-08', '2012-08-22', 500, 1, $filters);
				$total = $api->data($id, '', 'ga:totalEvents,ga:uniqueEvents', '', $start_date, $end_date, 1, 1, $filters);
				//print_r($total);
				//$data = $api->data($id, 'ga:eventCategory', 'ga:totalEvents,ga:uniqueEvents', '-ga:totalEvents', $start_date, $end_date, 500, 1, $filters);
				$analyticsData = array();
				//$date = array('start_date'=>$start_date,'end_date'=>$end_date);
				//array_push($total, "'start_date'=>$start_date", "'end_date'=>$end_date");
				$total['start_date'] = $start_date;
				$total['end_date'] = $end_date;
				//$analyticsData['date'] = $date;                 
				$analyticsData['totals'] = $total;   
				$analyticsData['data'] = $data;                 
				$jsonData = json_encode($analyticsData);
				if($save) {
					//print_r($jsonData);
					
					/*$monitor['data'] = $jsonData;
					$monitor['start_date'] = $start_date;
					$monitor['end_date'] = $end_date;
					$monitorTable =& $this->getTable('monitor');
					$monitorTable->save($monitor);*/
				}
				//print_r($jsonData);
				return $jsonData;
			}
		}
		else {
			return false;
		}
	}
	
}
