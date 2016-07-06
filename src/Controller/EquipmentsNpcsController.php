<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * EquipmentsNpcs Controller
 *
 * @property \App\Model\Table\EquipmentsNpcsTable $EquipmentsNpcs
 */
class EquipmentsNpcsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Equipments', 'Npcs', 'Territories']
        ];
        $equipmentsNpcs = $this->paginate($this->EquipmentsNpcs);

        $this->set(compact('equipmentsNpcs'));
        $this->set('_serialize', ['equipmentsNpcs']);
    }

    /**
     * View method
     *
     * @param string|null $id Equipments Npc id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $equipmentsNpc = $this->EquipmentsNpcs->get($id, [
            'contain' => ['Equipments', 'Npcs', 'Territories']
        ]);

        $this->set('equipmentsNpc', $equipmentsNpc);
        $this->set('_serialize', ['equipmentsNpc']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $equipmentsNpc = $this->EquipmentsNpcs->newEntity();
        if ($this->request->is('post')) {
            $equipmentsNpc = $this->EquipmentsNpcs->patchEntity($equipmentsNpc, $this->request->data);
            if ($this->EquipmentsNpcs->save($equipmentsNpc)) {
                $this->Flash->success(__('The equipments npc has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The equipments npc could not be saved. Please, try again.'));
            }
        }
        $equipments = $this->EquipmentsNpcs->Equipments->find('list', ['limit' => 200]);
        $npcs = $this->EquipmentsNpcs->Npcs->find('list', ['limit' => 200]);
        $territories = $this->EquipmentsNpcs->Territories->find('list', ['limit' => 200]);
        $this->set(compact('equipmentsNpc', 'equipments', 'npcs', 'territories'));
        $this->set('_serialize', ['equipmentsNpc']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Equipments Npc id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $equipmentsNpc = $this->EquipmentsNpcs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $equipmentsNpc = $this->EquipmentsNpcs->patchEntity($equipmentsNpc, $this->request->data);
            if ($this->EquipmentsNpcs->save($equipmentsNpc)) {
                $this->Flash->success(__('The equipments npc has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The equipments npc could not be saved. Please, try again.'));
            }
        }
        $equipments = $this->EquipmentsNpcs->Equipments->find('list', ['limit' => 200]);
        $npcs = $this->EquipmentsNpcs->Npcs->find('list', ['limit' => 200]);
        $territories = $this->EquipmentsNpcs->Territories->find('list', ['limit' => 200]);
        $this->set(compact('equipmentsNpc', 'equipments', 'npcs', 'territories'));
        $this->set('_serialize', ['equipmentsNpc']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Equipments Npc id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $equipmentsNpc = $this->EquipmentsNpcs->get($id);
        if ($this->EquipmentsNpcs->delete($equipmentsNpc)) {
            $this->Flash->success(__('The equipments npc has been deleted.'));
        } else {
            $this->Flash->error(__('The equipments npc could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
