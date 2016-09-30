<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Npcs Controller
 *
 * @property \App\Model\Table\NpcsTable $Npcs
 */
class NpcsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Vocations', 'Monsters', 'Territories', 'Actions']
        ];
        $npcs = $this->paginate($this->Npcs);

        $this->set(compact('npcs'));
        $this->set('_serialize', ['npcs']);
    }

    /**
     * View method
     *
     * @param string|null $id Npc id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $npc = $this->Npcs->get($id, [
            'contain' => ['Vocations', 'Monsters', 'Territories', 'Actions', 'Fieves', 'Equipments', 'Comments', 'Fiefdoms', 'Personas']
        ]);

        $this->set('npc', $npc);
        $this->set('_serialize', ['npc']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $npc = $this->Npcs->newEntity();
        if ($this->request->is('post')) {
            $npc = $this->Npcs->patchEntity($npc, $this->request->data);
            if ($this->Npcs->save($npc)) {
                $this->Flash->success(__('The npc has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The npc could not be saved. Please, try again.'));
            }
        }
        $vocations = $this->Npcs->Vocations->find('list', ['limit' => 200]);
        $monsters = $this->Npcs->Monsters->find('list', ['limit' => 200]);
        $territories = $this->Npcs->Territories->find('list', ['limit' => 200]);
        $actions = $this->Npcs->Actions->find('list', ['limit' => 200]);
        $fieves = $this->Npcs->Fieves->find('list', ['limit' => 200]);
        $equipments = $this->Npcs->Equipments->find('list', ['limit' => 200]);
        $this->set(compact('npc', 'vocations', 'monsters', 'territories', 'actions', 'fieves', 'equipments'));
        $this->set('_serialize', ['npc']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Npc id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $npc = $this->Npcs->get($id, [
            'contain' => ['Fieves', 'Equipments']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $npc = $this->Npcs->patchEntity($npc, $this->request->data);
            if ($this->Npcs->save($npc)) {
                $this->Flash->success(__('The npc has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The npc could not be saved. Please, try again.'));
            }
        }
        $vocations = $this->Npcs->Vocations->find('list', ['limit' => 200]);
        $monsters = $this->Npcs->Monsters->find('list', ['limit' => 200]);
        $territories = $this->Npcs->Territories->find('list', ['limit' => 200]);
        $actions = $this->Npcs->Actions->find('list', ['limit' => 200]);
        $fieves = $this->Npcs->Fieves->find('list', ['limit' => 200]);
        $equipments = $this->Npcs->Equipments->find('list', ['limit' => 200]);
        $this->set(compact('npc', 'vocations', 'monsters', 'territories', 'actions', 'fieves', 'equipments'));
        $this->set('_serialize', ['npc']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Npc id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $npc = $this->Npcs->get($id);
        if ($this->Npcs->delete($npc)) {
            $this->Flash->success(__('The npc has been deleted.'));
        } else {
            $this->Flash->error(__('The npc could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
