<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * FievesNpcs Controller
 *
 * @property \App\Model\Table\FievesNpcsTable $FievesNpcs
 */
class FievesNpcsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Fieves', 'Npcs']
        ];
        $fievesNpcs = $this->paginate($this->FievesNpcs);

        $this->set(compact('fievesNpcs'));
        $this->set('_serialize', ['fievesNpcs']);
    }

    /**
     * View method
     *
     * @param string|null $id Fieves Npc id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $fievesNpc = $this->FievesNpcs->get($id, [
            'contain' => ['Fieves', 'Npcs']
        ]);

        $this->set('fievesNpc', $fievesNpc);
        $this->set('_serialize', ['fievesNpc']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $fievesNpc = $this->FievesNpcs->newEntity();
        if ($this->request->is('post')) {
            $fievesNpc = $this->FievesNpcs->patchEntity($fievesNpc, $this->request->data);
            if ($this->FievesNpcs->save($fievesNpc)) {
                $this->Flash->success(__('The fieves npc has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The fieves npc could not be saved. Please, try again.'));
            }
        }
        $fieves = $this->FievesNpcs->Fieves->find('list', ['limit' => 200]);
        $npcs = $this->FievesNpcs->Npcs->find('list', ['limit' => 200]);
        $this->set(compact('fievesNpc', 'fieves', 'npcs'));
        $this->set('_serialize', ['fievesNpc']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Fieves Npc id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $fievesNpc = $this->FievesNpcs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fievesNpc = $this->FievesNpcs->patchEntity($fievesNpc, $this->request->data);
            if ($this->FievesNpcs->save($fievesNpc)) {
                $this->Flash->success(__('The fieves npc has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The fieves npc could not be saved. Please, try again.'));
            }
        }
        $fieves = $this->FievesNpcs->Fieves->find('list', ['limit' => 200]);
        $npcs = $this->FievesNpcs->Npcs->find('list', ['limit' => 200]);
        $this->set(compact('fievesNpc', 'fieves', 'npcs'));
        $this->set('_serialize', ['fievesNpc']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Fieves Npc id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $fievesNpc = $this->FievesNpcs->get($id);
        if ($this->FievesNpcs->delete($fievesNpc)) {
            $this->Flash->success(__('The fieves npc has been deleted.'));
        } else {
            $this->Flash->error(__('The fieves npc could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
