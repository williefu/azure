<?php

class CreatorController extends AppController {
	public $helpers 	= array('Form', 'Html', 'Session', 'Js', 'Usermgmt.UserAuth', 'Minify.Minify');
	public $components 	= array('Session', 'RequestHandler', 'Usermgmt.UserAuth');

/*
	function beforeFilter(){
		$this->userAuth();
	}
	
	private function userAuth(){
		$this->UserAuth->beforeFilter($this);
	}
*/

	public function index() {
		
	
/*
		$ad_units	= $this->Creator->find('all');
		//print_r($ad_units);
		$this->set(array(
			'ad_units'=>$ad_units,
			'_serialize'=>array('ad_units')
		));
*/
	}
	
	public function adList() {
		
	}
	
	public function edit($id) {
		//echo $id;
	}
	
	/**
	AngularJS Feeds
	*/
	public function jsonList() {
		$origin_ads		= $this->Creator->find('all');
		$this->set(array(
			'origin_ads'=>$origin_ads
		));
	}
}
