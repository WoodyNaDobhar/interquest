<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Monsters Controller
 *
 * @property \App\Model\Table\MonstersTable $Monsters
 */
class MonstersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $monsters = $this->paginate($this->Monsters);

        $this->set(compact('monsters'));
        $this->set('_serialize', ['monsters']);
    }

    /**
     * View method
     *
     * @param string|null $id Monster id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $monster = $this->Monsters->get($id, [
            'contain' => ['Npcs', 'Personas']
        ]);

        $this->set('monster', $monster);
        $this->set('_serialize', ['monster']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $monster = $this->Monsters->newEntity();
        if ($this->request->is('post')) {
            $monster = $this->Monsters->patchEntity($monster, $this->request->data);
            if ($this->Monsters->save($monster)) {
                $this->Flash->success(__('The monster has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The monster could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('monster'));
        $this->set('_serialize', ['monster']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Monster id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $monster = $this->Monsters->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $monster = $this->Monsters->patchEntity($monster, $this->request->data);
            if ($this->Monsters->save($monster)) {
                $this->Flash->success(__('The monster has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The monster could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('monster'));
        $this->set('_serialize', ['monster']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Monster id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $monster = $this->Monsters->get($id);
        if ($this->Monsters->delete($monster)) {
            $this->Flash->success(__('The monster has been deleted.'));
        } else {
            $this->Flash->error(__('The monster could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
