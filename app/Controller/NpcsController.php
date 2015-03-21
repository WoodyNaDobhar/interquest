<?php
App::uses('AppController', 'Controller');
/**
 * Npcs Controller
 *
 * @property Npc $Npc
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class NpcsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Npc->recursive = 0;
		$this->set('npcs', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Npc->exists($id)) {
			throw new NotFoundException(__('Invalid npc'));
		}
		$options = array('conditions' => array('Npc.' . $this->Npc->primaryKey => $id));
		$this->set('npc', $this->Npc->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Npc->create();
			if ($this->Npc->save($this->request->data)) {
				$this->Session->setFlash(__('The npc has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The npc could not be saved. Please, try again.'));
			}
		}
		$playclasses = $this->Npc->Playclass->find('list');
		$monsters = $this->Npc->Monster->find('list');
		$territories = $this->Npc->Territory->find('list');
		$actions = $this->Npc->Action->find('list');
		$fieves = $this->Npc->Fief->find('list');
		$this->set(compact('playclasses', 'monsters', 'territories', 'actions', 'fieves'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Npc->exists($id)) {
			throw new NotFoundException(__('Invalid npc'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Npc->save($this->request->data)) {
				$this->Session->setFlash(__('The npc has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The npc could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Npc.' . $this->Npc->primaryKey => $id));
			$this->request->data = $this->Npc->find('first', $options);
		}
		$playclasses = $this->Npc->Playclass->find('list');
		$monsters = $this->Npc->Monster->find('list');
		$territories = $this->Npc->Territory->find('list');
		$actions = $this->Npc->Action->find('list');
		$fieves = $this->Npc->Fief->find('list');
		$this->set(compact('playclasses', 'monsters', 'territories', 'actions', 'fieves'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Npc->id = $id;
		if (!$this->Npc->exists()) {
			throw new NotFoundException(__('Invalid npc'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Npc->delete()) {
			$this->Session->setFlash(__('The npc has been deleted.'));
		} else {
			$this->Session->setFlash(__('The npc could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
