<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ActionsPersonas Controller
 *
 * @property \App\Model\Table\ActionsPersonasTable $ActionsPersonas
 */
class ActionsPersonasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Actions', 'Personas']
        ];
        $actionsPersonas = $this->paginate($this->ActionsPersonas);

        $this->set(compact('actionsPersonas'));
        $this->set('_serialize', ['actionsPersonas']);
    }

    /**
     * View method
     *
     * @param string|null $id Actions Persona id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $actionsPersona = $this->ActionsPersonas->get($id, [
            'contain' => ['Actions', 'Personas']
        ]);

        $this->set('actionsPersona', $actionsPersona);
        $this->set('_serialize', ['actionsPersona']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $actionsPersona = $this->ActionsPersonas->newEntity();
        if ($this->request->is('post')) {
            $actionsPersona = $this->ActionsPersonas->patchEntity($actionsPersona, $this->request->data);
            if ($this->ActionsPersonas->save($actionsPersona)) {
                $this->Flash->success(__('The actions persona has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The actions persona could not be saved. Please, try again.'));
            }
        }
        $actions = $this->ActionsPersonas->Actions->find('list', ['limit' => 200]);
        $personas = $this->ActionsPersonas->Personas->find('list', ['limit' => 200]);
        $this->set(compact('actionsPersona', 'actions', 'personas'));
        $this->set('_serialize', ['actionsPersona']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Actions Persona id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $actionsPersona = $this->ActionsPersonas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $actionsPersona = $this->ActionsPersonas->patchEntity($actionsPersona, $this->request->data);
            if ($this->ActionsPersonas->save($actionsPersona)) {
                $this->Flash->success(__('The actions persona has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The actions persona could not be saved. Please, try again.'));
            }
        }
        $actions = $this->ActionsPersonas->Actions->find('list', ['limit' => 200]);
        $personas = $this->ActionsPersonas->Personas->find('list', ['limit' => 200]);
        $this->set(compact('actionsPersona', 'actions', 'personas'));
        $this->set('_serialize', ['actionsPersona']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Actions Persona id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $actionsPersona = $this->ActionsPersonas->get($id);
        if ($this->ActionsPersonas->delete($actionsPersona)) {
            $this->Flash->success(__('The actions persona has been deleted.'));
        } else {
            $this->Flash->error(__('The actions persona could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
