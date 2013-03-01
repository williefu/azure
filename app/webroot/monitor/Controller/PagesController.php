<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

	public $uses = array('WebsvcEmcMonitor');
	//public $uses = array('WebsvcEmcMonitor','Google.GoogleDriveFiles');
	//public $uses = array('Google.GoogleDriveFiles');
	
/**
 * Displays a view
 *
 * @param string What page to display
 */
	public function display() {
		$path = func_get_args();

		$count = count($path);
		if (!$count) {
			$this->redirect('/');
		}
		$page = $subpage = $title = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title = Inflector::humanize($path[$count - 1]);
		}
		$this->set(compact('page', 'subpage'));
		$this->set('title_for_layout', $title);
		
		//Authorize google account
		//$this->redirect('/Json/monitorlist');
		/******
		$monitor = $this->WebsvcEmcMonitor->getMonitor();
		//print_r($monitor);
		$this->set('monitor', $monitor);
		//$this->redirect('/Json/jsonlist',$monitor);
		//$monitor = 'betty';
		//print_r($monitor);
		$this->redirect(array(
			'controller' => 'Json', 
			'action' => 'jsonlist', 
			//'monitor' => serialize($monitor)
			//'test' => 'hola'
		));*/
		
		/*$d = new Dispatcher(); 
		$d->dispatch( 
			array("controller" => "Json", "action" => "jsonlist"), 
			array("data"=>12) 
		); */ 
		//$this->redirect(array(
		//	'controller' => 'Json', 'action' => 'jsonlist', 'monitor' => $monitor
		//));
		/*$data = $this->GoogleDriveFiles->listItems();
		debug ($data);
	*/
		//$this->loadModel('GoogleAnalytics.GoogleAnalyticsAccount');
		//print_r($this->GoogleAnalyticsAccount->find('all'));
		/*$data = $this->GoogleAnalyticsAccount->find('first', array(
		'conditions' => array(
        'tableId' => $tableId,
        'start-date' => '2013-01-19',
        'end-date' => '2013-02-19',
        'dimensions' => 'country',
        'metrics' => 'newVisits',
        'sort' => '-newVisits')));*/
		//$this->set('monitor',);
		$this->render(implode('/', $path));
	}
	

}
