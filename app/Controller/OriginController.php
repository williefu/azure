<?php

class OriginController extends AppController {
	public $helpers 	= array('Form', 'Html', 'Session', 'Js', 'Usermgmt.UserAuth', 'Minify.Minify');
	public $components 	= array('Session', 'RequestHandler', 'Usermgmt.UserAuth');
	public $uses		= array('OriginAd', 'OriginAdSchedule', 'OriginAdContent', 'OriginAdTemplate');

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
	
	public function ad_list() {
		$this->render('list');
	}
	
	public function edit($id) {
	}
	
	
	/**
	* Ad templates
	*/
	public function templateList() {
		
	}
	
	public function templateEdit($id) {
		
	}
	
	/**
	* POST
	*/
	public function post() {
		if($this->request->data['route']) {
			$route		= $this->request->data['route'];
			$response	= $this->$route($this->request->data);
			$this->set('post', $response);
		}
	}
	
	public function templateSave($data) {
		if ($this->OriginAdTemplate->save($data)) {
			
			$data	= json_encode($this->OriginAdTemplate->find('all'));
			return $data;
		}
	}
	
	
	
	/**
	* JSON Feeds
	*/
	public function jsonList() {
		$origin_ads		= $this->OriginAd->find('all', array('recursive'=>-1));
		$this->set('origin_ads', $origin_ads);
	}
	
	public function jsonTemplate() {
		$origin_templates	= $this->OriginAdTemplate->find('all');
		$this->set('origin_templates', $origin_templates);
	}
}
