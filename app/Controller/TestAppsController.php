<?php
App::uses('AppController', 'Controller');
//App::uses('UsersController', 'Usermgmt.Controller');
/**
 * TestApps Controller
 *
 * @property TestApp $TestApp
 */
class TestAppsController extends AppController {

	var $uses = array('TestApp','TestAppsArticle');


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->TestApp->recursive = 0;
		$this->set('testApps', $this->paginate());
		//$appdata = $this->TestAppsArticle->find('all');
		//debug($appdata);
		//$this->set('appdata', $appdata);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->TestApp->id = $id;
		if (!$this->TestApp->exists()) {
			throw new NotFoundException(__('Invalid test app'));
		}
		$this->set('testApp', $this->TestApp->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TestApp->create();
			if ($this->TestApp->save($this->request->data)) {
				$this->Session->setFlash(__('The test app has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The test app could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->TestApp->id = $id;
		if (!$this->TestApp->exists()) {
			throw new NotFoundException(__('Invalid test app'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->TestApp->save($this->request->data)) {
				$this->Session->setFlash(__('The test app has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The test app could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->TestApp->read(null, $id);
			$this->request->data2 = $this->TestAppsArticle->read(null, $id);
			print_r($this->request->data2);
		}
	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->TestApp->id = $id;
		if (!$this->TestApp->exists()) {
			throw new NotFoundException(__('Invalid test app'));
		}
		if ($this->TestApp->delete()) {
			$this->Session->setFlash(__('Test app deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Test app was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
