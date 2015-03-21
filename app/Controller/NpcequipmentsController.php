<?php
App::uses('AppController', 'Controller');
/**
 * Npcequipments Controller
 *
 * @property Npcequipment $Npcequipment
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class NpcequipmentsController extends AppController {

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
		$this->Npcequipment->recursive = 0;
		$this->set('npcequipments', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Npcequipment->exists($id)) {
			throw new NotFoundException(__('Invalid npcequipment'));
		}
		$options = array('conditions' => array('Npcequipment.' . $this->Npcequipment->primaryKey => $id));
		$this->set('npcequipment', $this->Npcequipment->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Npcequipment->create();
			if ($this->Npcequipment->save($this->request->data)) {
				$this->Session->setFlash(__('The npcequipment has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The npcequipment could not be saved. Please, try again.'));
			}
		}
		$equipment = $this->Npcequipment->Equipment->find('list');
		$npcs = $this->Npcequipment->Npc->find('list');
		$territories = $this->Npcequipment->Territory->find('list');
		$this->set(compact('equipment', 'npcs', 'territories'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Npcequipment->exists($id)) {
			throw new NotFoundException(__('Invalid npcequipment'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Npcequipment->save($this->request->data)) {
				$this->Session->setFlash(__('The npcequipment has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The npcequipment could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Npcequipment.' . $this->Npcequipment->primaryKey => $id));
			$this->request->data = $this->Npcequipment->find('first', $options);
		}
		$equipment = $this->Npcequipment->Equipment->find('list');
		$npcs = $this->Npcequipment->Npc->find('list');
		$territories = $this->Npcequipment->Territory->find('list');
		$this->set(compact('equipment', 'npcs', 'territories'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Npcequipment->id = $id;
		if (!$this->Npcequipment->exists()) {
			throw new NotFoundException(__('Invalid npcequipment'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Npcequipment->delete()) {
			$this->Session->setFlash(__('The npcequipment has been deleted.'));
		} else {
			$this->Session->setFlash(__('The npcequipment could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
