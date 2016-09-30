<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Parks Controller
 *
 * @property \App\Model\Table\ParksTable $Parks
 */
class ParksController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Sectors']
        ];
        $parks = $this->paginate($this->Parks);

        $this->set(compact('parks'));
        $this->set('_serialize', ['parks']);
    }

    /**
     * View method
     *
     * @param string|null $id Park id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $park = $this->Parks->get($id, [
            'contain' => ['Sectors', 'Comments', 'Fiefdoms', 'Personas']
        ]);

        $this->set('park', $park);
        $this->set('_serialize', ['park']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $park = $this->Parks->newEntity();
        if ($this->request->is('post')) {
            $park = $this->Parks->patchEntity($park, $this->request->data);
            if ($this->Parks->save($park)) {
                $this->Flash->success(__('The park has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The park could not be saved. Please, try again.'));
            }
        }
        $sectors = $this->Parks->Sectors->find('list', ['limit' => 200]);
        $this->set(compact('park', 'sectors'));
        $this->set('_serialize', ['park']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Park id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $park = $this->Parks->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $park = $this->Parks->patchEntity($park, $this->request->data);
            if ($this->Parks->save($park)) {
                $this->Flash->success(__('The park has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The park could not be saved. Please, try again.'));
            }
        }
        $sectors = $this->Parks->Sectors->find('list', ['limit' => 200]);
        $this->set(compact('park', 'sectors'));
        $this->set('_serialize', ['park']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Park id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $park = $this->Parks->get($id);
        if ($this->Parks->delete($park)) {
            $this->Flash->success(__('The park has been deleted.'));
        } else {
            $this->Flash->error(__('The park could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
