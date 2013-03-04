<?php

class CreatorController extends Controller {
	public $helpers 	= array('Form', 'Html', 'Session', 'Js', 'Usermgmt.UserAuth', 'Minify.Minify');
	public $components 	= array('Session','RequestHandler', 'Usermgmt.UserAuth');

	function beforeFilter(){
		$this->userAuth();
	}
	
	private function userAuth(){
		$this->UserAuth->beforeFilter($this);
	}

	public function index() {
		$this -> viewPath = 'list';
	
		$ad_units	= $this->Creator->find('all');
		//print_r($ad_units);
		$this->set(array(
			'ad_units'=>$ad_units,
			'_serialize'=>array('ad_units')
		));
	}
}
