<?php
App::uses('AppController', 'Controller');
/**
 * Personas Controller
 *
 * @property Persona $Persona
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class PersonasController extends AppController {

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
		$this->Persona->recursive = 0;
		$this->set('personas', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Persona->exists($id)) {
			throw new NotFoundException(__('Invalid persona'));
		}
		$options = array('conditions' => array('Persona.' . $this->Persona->primaryKey => $id));
		$this->set('persona', $this->Persona->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Persona->create();
			if ($this->Persona->save($this->request->data)) {
				$this->Session->setFlash(__('The persona has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The persona could not be saved. Please, try again.'));
			}
		}
		$users = $this->Persona->User->find('list');
		$playclasses = $this->Persona->Playclass->find('list');
		$monsters = $this->Persona->Monster->find('list');
		$npcs = $this->Persona->Npc->find('list');
		$parks = $this->Persona->Park->find('list');
		$territories = $this->Persona->Territory->find('list');
		$actions = $this->Persona->Action->find('list');
		$fieves = $this->Persona->Fief->find('list');
		$titles = $this->Persona->Title->find('list');
		$this->set(compact('users', 'playclasses', 'monsters', 'npcs', 'parks', 'territories', 'actions', 'fieves', 'titles'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Persona->exists($id)) {
			throw new NotFoundException(__('Invalid persona'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Persona->save($this->request->data)) {
				$this->Session->setFlash(__('The persona has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The persona could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Persona.' . $this->Persona->primaryKey => $id));
			$this->request->data = $this->Persona->find('first', $options);
		}
		$users = $this->Persona->User->find('list');
		$playclasses = $this->Persona->Playclass->find('list');
		$monsters = $this->Persona->Monster->find('list');
		$npcs = $this->Persona->Npc->find('list');
		$parks = $this->Persona->Park->find('list');
		$territories = $this->Persona->Territory->find('list');
		$actions = $this->Persona->Action->find('list');
		$fieves = $this->Persona->Fief->find('list');
		$titles = $this->Persona->Title->find('list');
		$this->set(compact('users', 'playclasses', 'monsters', 'npcs', 'parks', 'territories', 'actions', 'fieves', 'titles'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Persona->id = $id;
		if (!$this->Persona->exists()) {
			throw new NotFoundException(__('Invalid persona'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Persona->delete()) {
			$this->Session->setFlash(__('The persona has been deleted.'));
		} else {
			$this->Session->setFlash(__('The persona could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
