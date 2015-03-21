<?php
App::uses('AppController', 'Controller');
/**
 * Playclasses Controller
 *
 * @property Playclass $Playclass
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class PlayclassesController extends AppController {

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
		$this->Playclass->recursive = 0;
		$this->set('playclasses', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Playclass->exists($id)) {
			throw new NotFoundException(__('Invalid playclass'));
		}
		$options = array('conditions' => array('Playclass.' . $this->Playclass->primaryKey => $id));
		$this->set('playclass', $this->Playclass->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Playclass->create();
			if ($this->Playclass->save($this->request->data)) {
				$this->Session->setFlash(__('The playclass has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The playclass could not be saved. Please, try again.'));
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
		if (!$this->Playclass->exists($id)) {
			throw new NotFoundException(__('Invalid playclass'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Playclass->save($this->request->data)) {
				$this->Session->setFlash(__('The playclass has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The playclass could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Playclass.' . $this->Playclass->primaryKey => $id));
			$this->request->data = $this->Playclass->find('first', $options);
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
		$this->Playclass->id = $id;
		if (!$this->Playclass->exists()) {
			throw new NotFoundException(__('Invalid playclass'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Playclass->delete()) {
			$this->Session->setFlash(__('The playclass has been deleted.'));
		} else {
			$this->Session->setFlash(__('The playclass could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
