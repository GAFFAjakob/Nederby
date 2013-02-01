<?php
App::uses('AppController', 'Controller');

/**
 * MinecraftLogs Controller
 *
 * @property MinecraftLog $MinecraftLog
 */
class MinecraftLogsController extends AppController {
	
	public $components = array('RequestHandler');
	
	public $paginate = array(
		'limit' => 25,
		'order' => array(
			'MinecraftLog.id' => 'desc'
		)
	);
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->MinecraftLog->recursive = 0;
		$this->set('minecraftLogs', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->MinecraftLog->id = $id;
		if (!$this->MinecraftLog->exists()) {
			throw new NotFoundException(__('Invalid minecraft log'));
		}
		$this->set('minecraftLog', $this->MinecraftLog->read(null, $id));
	}
	
	public function download(){
		
	}

/**
 * add method
 *
 * @return void
 *//**
	public function add() {
		if ($this->request->is('post')) {
			$this->MinecraftLog->create();
			if ($this->MinecraftLog->save($this->request->data)) {
				$this->Session->setFlash(__('The minecraft log has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The minecraft log could not be saved. Please, try again.'));
			}
		}
		$users = $this->MinecraftLog->User->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 *//**
	public function edit($id = null) {
		$this->MinecraftLog->id = $id;
		if (!$this->MinecraftLog->exists()) {
			throw new NotFoundException(__('Invalid minecraft log'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->MinecraftLog->save($this->request->data)) {
				$this->Session->setFlash(__('The minecraft log has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The minecraft log could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->MinecraftLog->read(null, $id);
		}
		$users = $this->MinecraftLog->User->find('list');
		$this->set(compact('users'));
	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 *//**
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->MinecraftLog->id = $id;
		if (!$this->MinecraftLog->exists()) {
			throw new NotFoundException(__('Invalid minecraft log'));
		}
		if ($this->MinecraftLog->delete()) {
			$this->Session->setFlash(__('Minecraft log deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Minecraft log was not deleted'));
		$this->redirect(array('action' => 'index'));
	}*/
}
