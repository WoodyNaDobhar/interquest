<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Vocations Controller
 *
 * @property \App\Model\Table\VocationsTable $Vocations
 */
class VocationsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $vocations = $this->paginate($this->Vocations);

        $this->set(compact('vocations'));
        $this->set('_serialize', ['vocations']);
    }

    /**
     * View method
     *
     * @param string|null $id Vocation id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $vocation = $this->Vocations->get($id, [
            'contain' => ['Npcs', 'Personas']
        ]);

        $this->set('vocation', $vocation);
        $this->set('_serialize', ['vocation']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $vocation = $this->Vocations->newEntity();
        if ($this->request->is('post')) {
            $vocation = $this->Vocations->patchEntity($vocation, $this->request->data);
            if ($this->Vocations->save($vocation)) {
                $this->Flash->success(__('The vocation has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The vocation could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('vocation'));
        $this->set('_serialize', ['vocation']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Vocation id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $vocation = $this->Vocations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $vocation = $this->Vocations->patchEntity($vocation, $this->request->data);
            if ($this->Vocations->save($vocation)) {
                $this->Flash->success(__('The vocation has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The vocation could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('vocation'));
        $this->set('_serialize', ['vocation']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Vocation id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $vocation = $this->Vocations->get($id);
        if ($this->Vocations->delete($vocation)) {
            $this->Flash->success(__('The vocation has been deleted.'));
        } else {
            $this->Flash->error(__('The vocation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
