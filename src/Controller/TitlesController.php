<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Titles Controller
 *
 * @property \App\Model\Table\TitlesTable $Titles
 */
class TitlesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $titles = $this->paginate($this->Titles);

        $this->set(compact('titles'));
        $this->set('_serialize', ['titles']);
    }

    /**
     * View method
     *
     * @param string|null $id Title id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $title = $this->Titles->get($id, [
            'contain' => ['Personas']
        ]);

        $this->set('title', $title);
        $this->set('_serialize', ['title']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $title = $this->Titles->newEntity();
        if ($this->request->is('post')) {
            $title = $this->Titles->patchEntity($title, $this->request->data);
            if ($this->Titles->save($title)) {
                $this->Flash->success(__('The title has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The title could not be saved. Please, try again.'));
            }
        }
        $personas = $this->Titles->Personas->find('list', ['limit' => 200]);
        $this->set(compact('title', 'personas'));
        $this->set('_serialize', ['title']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Title id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $title = $this->Titles->get($id, [
            'contain' => ['Personas']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $title = $this->Titles->patchEntity($title, $this->request->data);
            if ($this->Titles->save($title)) {
                $this->Flash->success(__('The title has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The title could not be saved. Please, try again.'));
            }
        }
        $personas = $this->Titles->Personas->find('list', ['limit' => 200]);
        $this->set(compact('title', 'personas'));
        $this->set('_serialize', ['title']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Title id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $title = $this->Titles->get($id);
        if ($this->Titles->delete($title)) {
            $this->Flash->success(__('The title has been deleted.'));
        } else {
            $this->Flash->error(__('The title could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
