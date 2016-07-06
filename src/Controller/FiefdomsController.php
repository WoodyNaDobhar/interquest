<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Fiefdoms Controller
 *
 * @property \App\Model\Table\FiefdomsTable $Fiefdoms
 */
class FiefdomsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Personas', 'Npcs', 'Parks']
        ];
        $fiefdoms = $this->paginate($this->Fiefdoms);

        $this->set(compact('fiefdoms'));
        $this->set('_serialize', ['fiefdoms']);
    }

    /**
     * View method
     *
     * @param string|null $id Fiefdom id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $fiefdom = $this->Fiefdoms->get($id, [
            'contain' => ['Personas', 'Npcs', 'Parks', 'Fieves']
        ]);

        $this->set('fiefdom', $fiefdom);
        $this->set('_serialize', ['fiefdom']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $fiefdom = $this->Fiefdoms->newEntity();
        if ($this->request->is('post')) {
            $fiefdom = $this->Fiefdoms->patchEntity($fiefdom, $this->request->data);
            if ($this->Fiefdoms->save($fiefdom)) {
                $this->Flash->success(__('The fiefdom has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The fiefdom could not be saved. Please, try again.'));
            }
        }
        $personas = $this->Fiefdoms->Personas->find('list', ['limit' => 200]);
        $npcs = $this->Fiefdoms->Npcs->find('list', ['limit' => 200]);
        $parks = $this->Fiefdoms->Parks->find('list', ['limit' => 200]);
        $this->set(compact('fiefdom', 'personas', 'npcs', 'parks'));
        $this->set('_serialize', ['fiefdom']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Fiefdom id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $fiefdom = $this->Fiefdoms->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fiefdom = $this->Fiefdoms->patchEntity($fiefdom, $this->request->data);
            if ($this->Fiefdoms->save($fiefdom)) {
                $this->Flash->success(__('The fiefdom has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The fiefdom could not be saved. Please, try again.'));
            }
        }
        $personas = $this->Fiefdoms->Personas->find('list', ['limit' => 200]);
        $npcs = $this->Fiefdoms->Npcs->find('list', ['limit' => 200]);
        $parks = $this->Fiefdoms->Parks->find('list', ['limit' => 200]);
        $this->set(compact('fiefdom', 'personas', 'npcs', 'parks'));
        $this->set('_serialize', ['fiefdom']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Fiefdom id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $fiefdom = $this->Fiefdoms->get($id);
        if ($this->Fiefdoms->delete($fiefdom)) {
            $this->Flash->success(__('The fiefdom has been deleted.'));
        } else {
            $this->Flash->error(__('The fiefdom could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
