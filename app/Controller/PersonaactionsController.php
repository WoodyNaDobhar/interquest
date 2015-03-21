<?php
App::uses('AppController', 'Controller');
/**
 * Personaactions Controller
 *
 * @property Personaaction $Personaaction
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class PersonaactionsController extends AppController {

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
		$this->Personaaction->recursive = 0;
		$this->set('personaactions', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Personaaction->exists($id)) {
			throw new NotFoundException(__('Invalid personaaction'));
		}
		$options = array('conditions' => array('Personaaction.' . $this->Personaaction->primaryKey => $id));
		$this->set('personaaction', $this->Personaaction->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Personaaction->create();
			if ($this->Personaaction->save($this->request->data)) {
				$this->Session->setFlash(__('The personaaction has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The personaaction could not be saved. Please, try again.'));
			}
		}
		$actions = $this->Personaaction->Action->find('list');
		$personas = $this->Personaaction->Persona->find('list');
		$this->set(compact('actions', 'personas'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Personaaction->exists($id)) {
			throw new NotFoundException(__('Invalid personaaction'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Personaaction->save($this->request->data)) {
				$this->Session->setFlash(__('The personaaction has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The personaaction could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Personaaction.' . $this->Personaaction->primaryKey => $id));
			$this->request->data = $this->Personaaction->find('first', $options);
		}
		$actions = $this->Personaaction->Action->find('list');
		$personas = $this->Personaaction->Persona->find('list');
		$this->set(compact('actions', 'personas'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Personaaction->id = $id;
		if (!$this->Personaaction->exists()) {
			throw new NotFoundException(__('Invalid personaaction'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Personaaction->delete()) {
			$this->Session->setFlash(__('The personaaction has been deleted.'));
		} else {
			$this->Session->setFlash(__('The personaaction could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
