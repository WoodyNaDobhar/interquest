<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Fieves Controller
 *
 * @property \App\Model\Table\FievesTable $Fieves
 */
class FievesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Territories', 'Fiefdoms']
        ];
        $fieves = $this->paginate($this->Fieves);

        $this->set(compact('fieves'));
        $this->set('_serialize', ['fieves']);
    }

    /**
     * View method
     *
     * @param string|null $id Fief id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $fief = $this->Fieves->get($id, [
            'contain' => ['Territories', 'Fiefdoms', 'Personas', 'Npcs']
        ]);

        $this->set('fief', $fief);
        $this->set('_serialize', ['fief']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $fief = $this->Fieves->newEntity();
        if ($this->request->is('post')) {
            $fief = $this->Fieves->patchEntity($fief, $this->request->data);
            if ($this->Fieves->save($fief)) {
                $this->Flash->success(__('The fief has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The fief could not be saved. Please, try again.'));
            }
        }
        $territories = $this->Fieves->Territories->find('list', ['limit' => 200]);
        $fiefdoms = $this->Fieves->Fiefdoms->find('list', ['limit' => 200]);
        $personas = $this->Fieves->Personas->find('list', ['limit' => 200]);
        $npcs = $this->Fieves->Npcs->find('list', ['limit' => 200]);
        $this->set(compact('fief', 'territories', 'fiefdoms', 'personas', 'npcs'));
        $this->set('_serialize', ['fief']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Fief id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $fief = $this->Fieves->get($id, [
            'contain' => ['Personas', 'Npcs']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fief = $this->Fieves->patchEntity($fief, $this->request->data);
            if ($this->Fieves->save($fief)) {
                $this->Flash->success(__('The fief has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The fief could not be saved. Please, try again.'));
            }
        }
        $territories = $this->Fieves->Territories->find('list', ['limit' => 200]);
        $fiefdoms = $this->Fieves->Fiefdoms->find('list', ['limit' => 200]);
        $personas = $this->Fieves->Personas->find('list', ['limit' => 200]);
        $npcs = $this->Fieves->Npcs->find('list', ['limit' => 200]);
        $this->set(compact('fief', 'territories', 'fiefdoms', 'personas', 'npcs'));
        $this->set('_serialize', ['fief']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Fief id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $fief = $this->Fieves->get($id);
        if ($this->Fieves->delete($fief)) {
            $this->Flash->success(__('The fief has been deleted.'));
        } else {
            $this->Flash->error(__('The fief could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
