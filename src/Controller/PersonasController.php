<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Personas Controller
 *
 * @property \App\Model\Table\PersonasTable $Personas
 */
class PersonasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Orks', 'Users', 'Vocations', 'Monsters', 'Npcs', 'Parks', 'Territories']
        ];
        $personas = $this->paginate($this->Personas);

        $this->set(compact('personas'));
        $this->set('_serialize', ['personas']);
    }

    /**
     * View method
     *
     * @param string|null $id Persona id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $persona = $this->Personas->get($id, [
            'contain' => ['Orks', 'Users', 'Vocations', 'Monsters', 'Npcs', 'Parks', 'Territories', 'Actions', 'Fieves', 'Equipments', 'Titles', 'Comments', 'Fiefdoms']
        ]);

        $this->set('persona', $persona);
        $this->set('_serialize', ['persona']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $persona = $this->Personas->newEntity();
        if ($this->request->is('post')) {
            $persona = $this->Personas->patchEntity($persona, $this->request->data);
            if ($this->Personas->save($persona)) {
                $this->Flash->success(__('The persona has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The persona could not be saved. Please, try again.'));
            }
        }
        $orks = $this->Personas->Orks->find('list', ['limit' => 200]);
        $users = $this->Personas->Users->find('list', ['limit' => 200]);
        $vocations = $this->Personas->Vocations->find('list', ['limit' => 200]);
        $monsters = $this->Personas->Monsters->find('list', ['limit' => 200]);
        $npcs = $this->Personas->Npcs->find('list', ['limit' => 200]);
        $parks = $this->Personas->Parks->find('list', ['limit' => 200]);
        $territories = $this->Personas->Territories->find('list', ['limit' => 200]);
        $actions = $this->Personas->Actions->find('list', ['limit' => 200]);
        $fieves = $this->Personas->Fieves->find('list', ['limit' => 200]);
        $equipments = $this->Personas->Equipments->find('list', ['limit' => 200]);
        $titles = $this->Personas->Titles->find('list', ['limit' => 200]);
        $this->set(compact('persona', 'orks', 'users', 'vocations', 'monsters', 'npcs', 'parks', 'territories', 'actions', 'fieves', 'equipments', 'titles'));
        $this->set('_serialize', ['persona']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Persona id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $persona = $this->Personas->get($id, [
            'contain' => ['Actions', 'Fieves', 'Equipments', 'Titles']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $persona = $this->Personas->patchEntity($persona, $this->request->data);
            if ($this->Personas->save($persona)) {
                $this->Flash->success(__('The persona has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The persona could not be saved. Please, try again.'));
            }
        }
        $orks = $this->Personas->Orks->find('list', ['limit' => 200]);
        $users = $this->Personas->Users->find('list', ['limit' => 200]);
        $vocations = $this->Personas->Vocations->find('list', ['limit' => 200]);
        $monsters = $this->Personas->Monsters->find('list', ['limit' => 200]);
        $npcs = $this->Personas->Npcs->find('list', ['limit' => 200]);
        $parks = $this->Personas->Parks->find('list', ['limit' => 200]);
        $territories = $this->Personas->Territories->find('list', ['limit' => 200]);
        $actions = $this->Personas->Actions->find('list', ['limit' => 200]);
        $fieves = $this->Personas->Fieves->find('list', ['limit' => 200]);
        $equipments = $this->Personas->Equipments->find('list', ['limit' => 200]);
        $titles = $this->Personas->Titles->find('list', ['limit' => 200]);
        $this->set(compact('persona', 'orks', 'users', 'vocations', 'monsters', 'npcs', 'parks', 'territories', 'actions', 'fieves', 'equipments', 'titles'));
        $this->set('_serialize', ['persona']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Persona id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $persona = $this->Personas->get($id);
        if ($this->Personas->delete($persona)) {
            $this->Flash->success(__('The persona has been deleted.'));
        } else {
            $this->Flash->error(__('The persona could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
