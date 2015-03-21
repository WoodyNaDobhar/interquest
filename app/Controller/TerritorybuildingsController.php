<?php
App::uses('AppController', 'Controller');
/**
 * Territorybuildings Controller
 *
 * @property Territorybuilding $Territorybuilding
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class TerritorybuildingsController extends AppController {

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
		$this->Territorybuilding->recursive = 0;
		$this->set('territorybuildings', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Territorybuilding->exists($id)) {
			throw new NotFoundException(__('Invalid territorybuilding'));
		}
		$options = array('conditions' => array('Territorybuilding.' . $this->Territorybuilding->primaryKey => $id));
		$this->set('territorybuilding', $this->Territorybuilding->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Territorybuilding->create();
			if ($this->Territorybuilding->save($this->request->data)) {
				$this->Session->setFlash(__('The territorybuilding has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The territorybuilding could not be saved. Please, try again.'));
			}
		}
		$buildings = $this->Territorybuilding->Building->find('list');
		$territories = $this->Territorybuilding->Territory->find('list');
		$this->set(compact('buildings', 'territories'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Territorybuilding->exists($id)) {
			throw new NotFoundException(__('Invalid territorybuilding'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Territorybuilding->save($this->request->data)) {
				$this->Session->setFlash(__('The territorybuilding has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The territorybuilding could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Territorybuilding.' . $this->Territorybuilding->primaryKey => $id));
			$this->request->data = $this->Territorybuilding->find('first', $options);
		}
		$buildings = $this->Territorybuilding->Building->find('list');
		$territories = $this->Territorybuilding->Territory->find('list');
		$this->set(compact('buildings', 'territories'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Territorybuilding->id = $id;
		if (!$this->Territorybuilding->exists()) {
			throw new NotFoundException(__('Invalid territorybuilding'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Territorybuilding->delete()) {
			$this->Session->setFlash(__('The territorybuilding has been deleted.'));
		} else {
			$this->Session->setFlash(__('The territorybuilding could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
