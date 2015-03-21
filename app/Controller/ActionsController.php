<?php
App::uses('AppController', 'Controller');
/**
 * Actions Controller
 *
 * @property Action $Action
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ActionsController extends AppController {

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
		$this->Action->recursive = 0;
		$this->set('actions', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Action->exists($id)) {
			throw new NotFoundException(__('Invalid action'));
		}
		$options = array('conditions' => array('Action.' . $this->Action->primaryKey => $id));
		$this->set('action', $this->Action->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Action->create();
			if ($this->Action->save($this->request->data)) {
				$this->Session->setFlash(__('The action has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The action could not be saved. Please, try again.'));
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
		if (!$this->Action->exists($id)) {
			throw new NotFoundException(__('Invalid action'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Action->save($this->request->data)) {
				$this->Session->setFlash(__('The action has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The action could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Action.' . $this->Action->primaryKey => $id));
			$this->request->data = $this->Action->find('first', $options);
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
		$this->Action->id = $id;
		if (!$this->Action->exists()) {
			throw new NotFoundException(__('Invalid action'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Action->delete()) {
			$this->Session->setFlash(__('The action has been deleted.'));
		} else {
			$this->Session->setFlash(__('The action could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
