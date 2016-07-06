<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * EquipmentsPersonas Controller
 *
 * @property \App\Model\Table\EquipmentsPersonasTable $EquipmentsPersonas
 */
class EquipmentsPersonasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Equipments', 'Personas', 'Territories']
        ];
        $equipmentsPersonas = $this->paginate($this->EquipmentsPersonas);

        $this->set(compact('equipmentsPersonas'));
        $this->set('_serialize', ['equipmentsPersonas']);
    }

    /**
     * View method
     *
     * @param string|null $id Equipments Persona id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $equipmentsPersona = $this->EquipmentsPersonas->get($id, [
            'contain' => ['Equipments', 'Personas', 'Territories']
        ]);

        $this->set('equipmentsPersona', $equipmentsPersona);
        $this->set('_serialize', ['equipmentsPersona']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $equipmentsPersona = $this->EquipmentsPersonas->newEntity();
        if ($this->request->is('post')) {
            $equipmentsPersona = $this->EquipmentsPersonas->patchEntity($equipmentsPersona, $this->request->data);
            if ($this->EquipmentsPersonas->save($equipmentsPersona)) {
                $this->Flash->success(__('The equipments persona has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The equipments persona could not be saved. Please, try again.'));
            }
        }
        $equipments = $this->EquipmentsPersonas->Equipments->find('list', ['limit' => 200]);
        $personas = $this->EquipmentsPersonas->Personas->find('list', ['limit' => 200]);
        $territories = $this->EquipmentsPersonas->Territories->find('list', ['limit' => 200]);
        $this->set(compact('equipmentsPersona', 'equipments', 'personas', 'territories'));
        $this->set('_serialize', ['equipmentsPersona']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Equipments Persona id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $equipmentsPersona = $this->EquipmentsPersonas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $equipmentsPersona = $this->EquipmentsPersonas->patchEntity($equipmentsPersona, $this->request->data);
            if ($this->EquipmentsPersonas->save($equipmentsPersona)) {
                $this->Flash->success(__('The equipments persona has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The equipments persona could not be saved. Please, try again.'));
            }
        }
        $equipments = $this->EquipmentsPersonas->Equipments->find('list', ['limit' => 200]);
        $personas = $this->EquipmentsPersonas->Personas->find('list', ['limit' => 200]);
        $territories = $this->EquipmentsPersonas->Territories->find('list', ['limit' => 200]);
        $this->set(compact('equipmentsPersona', 'equipments', 'personas', 'territories'));
        $this->set('_serialize', ['equipmentsPersona']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Equipments Persona id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $equipmentsPersona = $this->EquipmentsPersonas->get($id);
        if ($this->EquipmentsPersonas->delete($equipmentsPersona)) {
            $this->Flash->success(__('The equipments persona has been deleted.'));
        } else {
            $this->Flash->error(__('The equipments persona could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
