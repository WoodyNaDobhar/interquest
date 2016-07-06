<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Terrains Controller
 *
 * @property \App\Model\Table\TerrainsTable $Terrains
 */
class TerrainsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $terrains = $this->paginate($this->Terrains);

        $this->set(compact('terrains'));
        $this->set('_serialize', ['terrains']);
    }

    /**
     * View method
     *
     * @param string|null $id Terrain id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $terrain = $this->Terrains->get($id, [
            'contain' => ['Territories']
        ]);

        $this->set('terrain', $terrain);
        $this->set('_serialize', ['terrain']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $terrain = $this->Terrains->newEntity();
        if ($this->request->is('post')) {
            $terrain = $this->Terrains->patchEntity($terrain, $this->request->data);
            if ($this->Terrains->save($terrain)) {
                $this->Flash->success(__('The terrain has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The terrain could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('terrain'));
        $this->set('_serialize', ['terrain']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Terrain id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $terrain = $this->Terrains->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $terrain = $this->Terrains->patchEntity($terrain, $this->request->data);
            if ($this->Terrains->save($terrain)) {
                $this->Flash->success(__('The terrain has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The terrain could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('terrain'));
        $this->set('_serialize', ['terrain']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Terrain id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $terrain = $this->Terrains->get($id);
        if ($this->Terrains->delete($terrain)) {
            $this->Flash->success(__('The terrain has been deleted.'));
        } else {
            $this->Flash->error(__('The terrain could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
