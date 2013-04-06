<?php

class OriginController extends AppController {
	public $helpers 	= array('Form', 'Html', 'Session', 'Js', 'Usermgmt.UserAuth', 'Minify.Minify');
	public $components 	= array('Session', 'RequestHandler', 'Usermgmt.UserAuth');
	public $uses		= array('OriginAd', 'OriginTemplate', 'OriginComponent', 'OriginAdSchedule', 'Usermgmt.User', 'Usermgmt.UserGroup', 'Usermgmt.LoginToken');

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
		$this->set('title_for_layout', 'Origin Ads');
		$this->render('list');
	}
	
	public function edit() {
		$this->set('title_for_layout', 'Editor');
	}
	
	
	/**
	* Dashboard functions
	*/
	public function dashboard() {
		$this->set('title_for_layout', 'Dashboard');
	}
	
	public function dashboardAccess() {
		$this->set('title_for_layout', 'System Settings');
	}
	
	public function dashboardUser() {
		
	}
	
	public function dashboardUserAdd($data) {
		//WHAT IS THIS FOR???
		$userGroups		= $this->UserGroup->getGroups();
		$this->set('userGroups', $userGroups);
		$this->User->set($data);
		
		if($this->User->RegisterValidate()) {
			
			
			
			
		} else {
			//DOESN'T WORK
			print_r($this->User->RegisterValidate());
		}
		
/*
		$userGroups=$this->UserGroup->getGroups();
		$this->set('userGroups', $userGroups);
		if ($this->request -> isPost()) {
			$this->User->set($this->data);
			if ($this->User->RegisterValidate()) {
				$this->request->data['User']['email_verified']=1;
				$this->request->data['User']['active']=1;
				$salt=$this->UserAuth->makeSalt();
				$this->request->data['User']['salt'] = $salt;
				$this->request->data['User']['password'] = $this->UserAuth->makePassword($this->request->data['User']['password'], $salt);
				$this->User->save($this->request->data,false);
				$this->Session->setFlash(__('The user is successfully added'));
				$this->redirect('/administrator/addUser');
			}
		}
*/
	}
	
	public function dashboardUserStatus($data) {
		$userId			= $data['id'];
		$active			= $data['status'];
		
		if (!empty($userId)) {
			$user=array();
			$user['User']['id']=$userId;
			$user['User']['active']=($active) ? 1 : 0;
			$this->User->save($user,false);
		}
		
	}
	
	
	
	
	
	
	
	
	/**
	* Ad templates
	*/
	public function templateList() {
		$this->set('title_for_layout', 'Ad Templates');
	}
	
	public function templateEdit($id) {
		
	}
	
	/**
	* Components
	*/
	public function componentList() {
		$this->set('title_for_layout', 'Ad Components');
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
			
			$schedule['origin_ad_id']	= $this->OriginAd->id;
			$this->OriginAdSchedule->save($schedule);
			
			return '/administrator/Origin/ad/edit/'.$this->OriginAd->id;
		}
	}
	
	private function componentDelete($data) {
		$id		= $data['id'];
		
		if($this->OriginComponent->delete($id)) {
			$origin_components	= $this->OriginComponent->find('all',
			array(
				'order'=>array('OriginComponent.name ASC')
			));
			$this->set('origin_components', $origin_components);
			return $this->render('/Origin/json/json_component');
		}
	}
	
	private function componentSave($data) {
		$data['content']		= json_encode($data['content']);
		
		if(!isset($data['id'])) {
			$data['create_by']	= $this->UserAuth->getUserId();
		}
		
		$data['modify_date']	= date('Y-m-d H:i:s');
		$data['modify_by']		= $this->UserAuth->getUserId();
		
		if($this->OriginComponent->save($data)) {
			$origin_components	= $this->OriginComponent->find('all',
			array(
				'order'=>array('OriginComponent.name ASC')
			));
			$this->set('origin_components', $origin_components);
			return $this->render('/Origin/json/json_component');
		}
	}
	
	private function templateDisable() {
		
	}
	
	private function templateDelete($data) {
		$id		= $data['id'];
		
		if($this->OriginTemplate->delete($id)) {
			$origin_templates	= $this->OriginTemplate->find('all',
			array(
				'order'=>array('OriginTemplate.name ASC')
			));
			$this->set('origin_templates', $origin_templates);
			return $this->render('/Origin/json/json_template');
		}
	}
	
	private function templateSave($data) {
		$data['content']		= json_encode($data['content']);
		$data['config']			= json_encode($data['config']);
		
		if(!isset($data['id'])) {
			$data['create_by']	= $this->UserAuth->getUserId();
		}
		
		$data['modify_date']	= date('Y-m-d H:i:s');
		$data['modify_by']		= $this->UserAuth->getUserId();
		
		if($this->OriginTemplate->save($data)) {
			$origin_templates	= $this->OriginTemplate->find('all',
			array(
				'order'=>array('OriginTemplate.name ASC')
			));
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
		$origin_template	= $this->OriginTemplate->find('first', 
			array(
				'conditions'=>array('OriginTemplate.id'=>$template_id)
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
	
	public function jsonComponent() {
		$origin_components	= $this->OriginComponent->find('all',
			array(
				'order'=>array('OriginComponent.name ASC')
			)
		);
		$this->set('origin_components', $origin_components);
	}
	
	public function jsonTemplate() {
		$origin_templates	= $this->OriginTemplate->find('all',
			array(
				'order'=>array('OriginTemplate.name ASC')
			)
		);
		$this->set('origin_templates', $origin_templates);
	}
}
