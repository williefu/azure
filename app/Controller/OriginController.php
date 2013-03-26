<?php

class OriginController extends AppController {
	public $helpers 	= array('Form', 'Html', 'Session', 'Js', 'Usermgmt.UserAuth', 'Minify.Minify');
	public $components 	= array('Session', 'RequestHandler', 'Usermgmt.UserAuth');
	public $uses		= array('OriginAd', 'OriginAdTemplate');

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
	
	public function edit() {
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
			unset($this->request->data['route']);
			$response	= $this->$route($this->request->data);
			$this->set('post', $response);
		}
	}
	
	private function adCreate($data) {
		$data['config']			= json_encode($data);
		$data['create_by']		= $this->UserAuth->getUserId();
		$data['modify_by']		= $this->UserAuth->getUserId();
		$data['modify_date']	= date('Y-m-d H:i:s');
		
		if($this->OriginAd->save($data)) {
			return '/administrator/Origin/ad/edit/'.$this->OriginAd->id;
		}
	}
	
	private function templateDisable() {
		
	}
	
	private function templateDelete($data) {
		$id		= $data['id'];
		
		if($this->OriginAdTemplate->delete($id)) {
			$origin_templates	= $this->OriginAdTemplate->find('all');
			$this->set('origin_templates', $origin_templates);
			return $this->render('/Origin/json/json_template');
		}
	}
	
	private function templateSave($data) {
		$data['content']		= json_encode($data['content']);
		
		if(!isset($data['id'])) {
			$data['create_by']	= $this->UserAuth->getUserId();
		}
		
		$data['modify_date']	= date('Y-m-d H:i:s');
		$data['modify_by']		= $this->UserAuth->getUserId();
		
		if($this->OriginAdTemplate->save($data)) {
			$origin_templates	= $this->OriginAdTemplate->find('all');
			$this->set('origin_templates', $origin_templates);
			return $this->render('/Origin/json/json_template');
		}
	}
	
	public function upload() {
		App::import('Vendor', 'UploadHandler', array('file'=>'UploadHandler/uploadHandler.class.php'));
		
		$upload_handler = new UploadHandler();
		header('Pragma: no-cache');
		header('Cache-Control: private, no-cache');
		header('Content-Disposition: inline; filename="files.json"');
		header('X-Content-Type-Options: nosniff');
		header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: OPTIONS, HEAD, GET, POST, PUT, DELETE');
		header('Access-Control-Allow-Headers: X-File-Name, X-File-Type, X-File-Size');
		
		switch ($_SERVER['REQUEST_METHOD']) {
			case 'POST':
				$upload_handler->post();
		        break;
		    default:
		        header('HTTP/1.1 405 Method Not Allowed');
		}
		
		exit;
	}
	
	/**
	* JSON Feeds
	*/
	public function jsonAdTemplate() {
		$template_id		= $this->request->params['template_id'];
		$origin_template	= $this->OriginAdTemplate->find('first', 
			array(
				'conditions'=>array('OriginAdTemplate.id'=>$template_id)
			)
		);
		$this->set('origin_template', $origin_template);
	}
	
	public function jsonAdUnit() {
		$originAd_id 	= $this->request->params['originAd_id'];
		$origin_ad		= $this->OriginAd->find('first', 
			array(
				'recursive'=>2,
				'conditions'=>array('OriginAd.id'=>$originAd_id)
			)
		);
		$this->set('origin_ad', $origin_ad);
	}
	
	public function jsonList() {
		$origin_ads		= $this->OriginAd->find('all', array('recursive'=>-1));
		$this->set('origin_ads', $origin_ads);
	}
	
	public function jsonTemplate() {
		$origin_templates	= $this->OriginAdTemplate->find('all',
			array(
				'order'=>array('OriginAdTemplate.name ASC')
			)
		);
		$this->set('origin_templates', $origin_templates);
	}
}
