<?php
App::uses('AppController', 'Controller');
/**
 * Personaequipments Controller
 *
 * @property Personaequipment $Personaequipment
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class PersonaequipmentsController extends AppController {

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
		$this->Personaequipment->recursive = 0;
		$this->set('personaequipments', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Personaequipment->exists($id)) {
			throw new NotFoundException(__('Invalid personaequipment'));
		}
		$options = array('conditions' => array('Personaequipment.' . $this->Personaequipment->primaryKey => $id));
		$this->set('personaequipment', $this->Personaequipment->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Personaequipment->create();
			if ($this->Personaequipment->save($this->request->data)) {
				$this->Session->setFlash(__('The personaequipment has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The personaequipment could not be saved. Please, try again.'));
			}
		}
		$equipment = $this->Personaequipment->Equipment->find('list');
		$personas = $this->Personaequipment->Persona->find('list');
		$territories = $this->Personaequipment->Territory->find('list');
		$this->set(compact('equipment', 'personas', 'territories'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Personaequipment->exists($id)) {
			throw new NotFoundException(__('Invalid personaequipment'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Personaequipment->save($this->request->data)) {
				$this->Session->setFlash(__('The personaequipment has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The personaequipment could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Personaequipment.' . $this->Personaequipment->primaryKey => $id));
			$this->request->data = $this->Personaequipment->find('first', $options);
		}
		$equipment = $this->Personaequipment->Equipment->find('list');
		$personas = $this->Personaequipment->Persona->find('list');
		$territories = $this->Personaequipment->Territory->find('list');
		$this->set(compact('equipment', 'personas', 'territories'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Personaequipment->id = $id;
		if (!$this->Personaequipment->exists()) {
			throw new NotFoundException(__('Invalid personaequipment'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Personaequipment->delete()) {
			$this->Session->setFlash(__('The personaequipment has been deleted.'));
		} else {
			$this->Session->setFlash(__('The personaequipment could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
