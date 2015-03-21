<?php
App::uses('AppController', 'Controller');
/**
 * Monsters Controller
 *
 * @property Monster $Monster
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class MonstersController extends AppController {

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
		$this->Monster->recursive = 0;
		$this->set('monsters', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Monster->exists($id)) {
			throw new NotFoundException(__('Invalid monster'));
		}
		$options = array('conditions' => array('Monster.' . $this->Monster->primaryKey => $id));
		$this->set('monster', $this->Monster->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Monster->create();
			if ($this->Monster->save($this->request->data)) {
				$this->Session->setFlash(__('The monster has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The monster could not be saved. Please, try again.'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Monster->exists($id)) {
			throw new NotFoundException(__('Invalid monster'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Monster->save($this->request->data)) {
				$this->Session->setFlash(__('The monster has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The monster could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Monster.' . $this->Monster->primaryKey => $id));
			$this->request->data = $this->Monster->find('first', $options);
		}
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Monster->id = $id;
		if (!$this->Monster->exists()) {
			throw new NotFoundException(__('Invalid monster'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Monster->delete()) {
			$this->Session->setFlash(__('The monster has been deleted.'));
		} else {
			$this->Session->setFlash(__('The monster could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
