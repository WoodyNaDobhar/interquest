<?php
App::uses('AppController', 'Controller');
/**
 * Territories Controller
 *
 * @property Territory $Territory
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class TerritoriesController extends AppController {

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
		$this->Territory->recursive = 0;
		$this->set('territories', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Territory->exists($id)) {
			throw new NotFoundException(__('Invalid territory'));
		}
		$options = array('conditions' => array('Territory.' . $this->Territory->primaryKey => $id));
		$this->set('territory', $this->Territory->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Territory->create();
			if ($this->Territory->save($this->request->data)) {
				$this->Session->setFlash(__('The territory has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The territory could not be saved. Please, try again.'));
			}
		}
		$sectors = $this->Territory->Sector->find('list');
		$personas = $this->Territory->Persona->find('list');
		$terrains = $this->Territory->Terrain->find('list');
		$this->set(compact('sectors', 'personas', 'terrains'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Territory->exists($id)) {
			throw new NotFoundException(__('Invalid territory'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Territory->save($this->request->data)) {
				$this->Session->setFlash(__('The territory has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The territory could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Territory.' . $this->Territory->primaryKey => $id));
			$this->request->data = $this->Territory->find('first', $options);
		}
		$sectors = $this->Territory->Sector->find('list');
		$personas = $this->Territory->Persona->find('list');
		$terrains = $this->Territory->Terrain->find('list');
		$this->set(compact('sectors', 'personas', 'terrains'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Territory->id = $id;
		if (!$this->Territory->exists()) {
			throw new NotFoundException(__('Invalid territory'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Territory->delete()) {
			$this->Session->setFlash(__('The territory has been deleted.'));
		} else {
			$this->Session->setFlash(__('The territory could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
