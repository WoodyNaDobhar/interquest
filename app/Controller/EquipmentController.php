<?php
App::uses('AppController', 'Controller');
/**
 * Equipment Controller
 *
 * @property Equipment $Equipment
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class EquipmentController extends AppController {

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
		$this->Equipment->recursive = 0;
		$this->set('equipment', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Equipment->exists($id)) {
			throw new NotFoundException(__('Invalid equipment'));
		}
		$options = array('conditions' => array('Equipment.' . $this->Equipment->primaryKey => $id));
		$this->set('equipment', $this->Equipment->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Equipment->create();
			if ($this->Equipment->save($this->request->data)) {
				$this->Session->setFlash(__('The equipment has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The equipment could not be saved. Please, try again.'));
			}
		}
		$buildings = $this->Equipment->Building->find('list');
		$this->set(compact('buildings'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Equipment->exists($id)) {
			throw new NotFoundException(__('Invalid equipment'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Equipment->save($this->request->data)) {
				$this->Session->setFlash(__('The equipment has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The equipment could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Equipment.' . $this->Equipment->primaryKey => $id));
			$this->request->data = $this->Equipment->find('first', $options);
		}
		$buildings = $this->Equipment->Building->find('list');
		$this->set(compact('buildings'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Equipment->id = $id;
		if (!$this->Equipment->exists()) {
			throw new NotFoundException(__('Invalid equipment'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Equipment->delete()) {
			$this->Session->setFlash(__('The equipment has been deleted.'));
		} else {
			$this->Session->setFlash(__('The equipment could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
