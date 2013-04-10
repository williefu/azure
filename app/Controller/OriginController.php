<?php

class OriginController extends AppController {
	public $helpers 	= array('Form', 'Html', 'Session', 'Js', 'Usermgmt.UserAuth', 'Minify.Minify');
	public $components 	= array('Session', 'RequestHandler', 'Usermgmt.UserAuth');
	public $uses		= array('OriginAd', 'OriginTemplate', 'OriginComponent', 'OriginAdSchedule', 'Usermgmt.User', 'Usermgmt.UserGroup', 'Usermgmt.LoginToken');

	public function beforeFilter() {
		parent::beforeFilter();
		$this->User->userAuth=$this->UserAuth;
	}

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
	
	public function dashboardGroupAdd($data) {
		$this->UserGroup->set($data);
		if($this->UserGroup->addValidate()) {
			$this->UserGroup->save($data, false);
		}
	}
	
	public function dashboardUser() {
		
	}
	
	public function dashboardUserAdd($data) {
		if($this->User->RegisterValidate()) {
			$data['email_verified']		= 1;
			$data['active']				= 1;
			$salt						= $this->UserAuth->makeSalt();
			$data['salt'] 				= $salt;
			$data['password'] 			= $this->UserAuth->makePassword($data['password'], $salt);
			$this->User->save($data,false);
		} else {
			return json_encode($this->User->invalidFields());
		}
	}
	
	public function dashboardUserPasswordUpdate($data) {
		$userId = $this->UserAuth->getUserId();		
		$this->User->set($data);
		
		if($this->User->RegisterValidate()) {
			$user	= array();
			$user['User']['id']=$userId;
			$salt=$this->UserAuth->makeSalt();
			$user['User']['salt'] = $salt;
			$user['User']['password'] = $this->UserAuth->makePassword($data['password'], $salt);
			$this->User->save($user,false);
			$this->LoginToken->deleteAll(array('LoginToken.user_id'=>$userId), false);
		} else {
			return json_encode($this->User->invalidFields());
		}
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
	
	public function dashboardUserUpdate($data) {
				
		if(isset($data['cpassword'])) {
			$this->User->set($data);
			
			if($data['password'] === $data['cpassword']) {
				$salt				= $this->UserAuth->makeSalt();
				$data['salt'] 		= $salt;
				$data['password'] 	= $this->UserAuth->makePassword($data['password'], $salt);
				if($this->User->RegisterValidate()) {
					$this->User->save($data, false);
				} else {
					return json_encode($this->User->invalidFields());
				}
			} else {
				unset($data['password']);
			}
		} else {
			unset($data['salt']);
			unset($data['password']);
			unset($data['cpassword']);
			unset($data['email_verified']);
			unset($data['active']);
			unset($data['ip_address']);
			unset($data['created']);
			unset($data['modified']);
			$this->User->set($data);
			
			if($this->User->RegisterValidate()) {
				$this->User->save($data, false);
			} else {
				return json_encode($this->User->invalidFields());
			}
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
	
	public function loadComponent() {
		$this->layout 	= 'components';
		$component 		= $this->request->params['component'];
		$this->set('component', $component);
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
