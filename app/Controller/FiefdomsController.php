<?php
App::uses('AppController', 'Controller');
/**
 * Fiefdoms Controller
 *
 * @property Fiefdom $Fiefdom
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class FiefdomsController extends AppController {

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
		$this->Fiefdom->recursive = 0;
		$this->set('fiefdoms', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Fiefdom->exists($id)) {
			throw new NotFoundException(__('Invalid fiefdom'));
		}
		$options = array('conditions' => array('Fiefdom.' . $this->Fiefdom->primaryKey => $id));
		$this->set('fiefdom', $this->Fiefdom->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Fiefdom->create();
			if ($this->Fiefdom->save($this->request->data)) {
				$this->Session->setFlash(__('The fiefdom has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The fiefdom could not be saved. Please, try again.'));
			}
		}
		$personas = $this->Fiefdom->Persona->find('list');
		$npcs = $this->Fiefdom->Npc->find('list');
		$parks = $this->Fiefdom->Park->find('list');
		$this->set(compact('personas', 'npcs', 'parks'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Fiefdom->exists($id)) {
			throw new NotFoundException(__('Invalid fiefdom'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Fiefdom->save($this->request->data)) {
				$this->Session->setFlash(__('The fiefdom has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The fiefdom could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Fiefdom.' . $this->Fiefdom->primaryKey => $id));
			$this->request->data = $this->Fiefdom->find('first', $options);
		}
		$personas = $this->Fiefdom->Persona->find('list');
		$npcs = $this->Fiefdom->Npc->find('list');
		$parks = $this->Fiefdom->Park->find('list');
		$this->set(compact('personas', 'npcs', 'parks'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Fiefdom->id = $id;
		if (!$this->Fiefdom->exists()) {
			throw new NotFoundException(__('Invalid fiefdom'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Fiefdom->delete()) {
			$this->Session->setFlash(__('The fiefdom has been deleted.'));
		} else {
			$this->Session->setFlash(__('The fiefdom could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
