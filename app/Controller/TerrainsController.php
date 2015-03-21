<?php
App::uses('AppController', 'Controller');
/**
 * Terrains Controller
 *
 * @property Terrain $Terrain
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class TerrainsController extends AppController {

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
		$this->Terrain->recursive = 0;
		$this->set('terrains', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Terrain->exists($id)) {
			throw new NotFoundException(__('Invalid terrain'));
		}
		$options = array('conditions' => array('Terrain.' . $this->Terrain->primaryKey => $id));
		$this->set('terrain', $this->Terrain->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Terrain->create();
			if ($this->Terrain->save($this->request->data)) {
				$this->Session->setFlash(__('The terrain has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The terrain could not be saved. Please, try again.'));
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
		if (!$this->Terrain->exists($id)) {
			throw new NotFoundException(__('Invalid terrain'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Terrain->save($this->request->data)) {
				$this->Session->setFlash(__('The terrain has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The terrain could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Terrain.' . $this->Terrain->primaryKey => $id));
			$this->request->data = $this->Terrain->find('first', $options);
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
		$this->Terrain->id = $id;
		if (!$this->Terrain->exists()) {
			throw new NotFoundException(__('Invalid terrain'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Terrain->delete()) {
			$this->Session->setFlash(__('The terrain has been deleted.'));
		} else {
			$this->Session->setFlash(__('The terrain could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
