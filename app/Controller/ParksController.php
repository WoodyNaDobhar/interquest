<?php
App::uses('AppController', 'Controller');
/**
 * Parks Controller
 *
 * @property Park $Park
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ParksController extends AppController {

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
		$this->Park->recursive = 0;
		$this->set('parks', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Park->exists($id)) {
			throw new NotFoundException(__('Invalid park'));
		}
		$options = array('conditions' => array('Park.' . $this->Park->primaryKey => $id));
		$this->set('park', $this->Park->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Park->create();
			if ($this->Park->save($this->request->data)) {
				$this->Session->setFlash(__('The park has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The park could not be saved. Please, try again.'));
			}
		}
		$sectors = $this->Park->Sector->find('list');
		$this->set(compact('sectors'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Park->exists($id)) {
			throw new NotFoundException(__('Invalid park'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Park->save($this->request->data)) {
				$this->Session->setFlash(__('The park has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The park could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Park.' . $this->Park->primaryKey => $id));
			$this->request->data = $this->Park->find('first', $options);
		}
		$sectors = $this->Park->Sector->find('list');
		$this->set(compact('sectors'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Park->id = $id;
		if (!$this->Park->exists()) {
			throw new NotFoundException(__('Invalid park'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Park->delete()) {
			$this->Session->setFlash(__('The park has been deleted.'));
		} else {
			$this->Session->setFlash(__('The park could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
