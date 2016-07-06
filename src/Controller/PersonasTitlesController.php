<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PersonasTitles Controller
 *
 * @property \App\Model\Table\PersonasTitlesTable $PersonasTitles
 */
class PersonasTitlesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Personas', 'Titles']
        ];
        $personasTitles = $this->paginate($this->PersonasTitles);

        $this->set(compact('personasTitles'));
        $this->set('_serialize', ['personasTitles']);
    }

    /**
     * View method
     *
     * @param string|null $id Personas Title id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $personasTitle = $this->PersonasTitles->get($id, [
            'contain' => ['Personas', 'Titles']
        ]);

        $this->set('personasTitle', $personasTitle);
        $this->set('_serialize', ['personasTitle']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $personasTitle = $this->PersonasTitles->newEntity();
        if ($this->request->is('post')) {
            $personasTitle = $this->PersonasTitles->patchEntity($personasTitle, $this->request->data);
            if ($this->PersonasTitles->save($personasTitle)) {
                $this->Flash->success(__('The personas title has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The personas title could not be saved. Please, try again.'));
            }
        }
        $personas = $this->PersonasTitles->Personas->find('list', ['limit' => 200]);
        $titles = $this->PersonasTitles->Titles->find('list', ['limit' => 200]);
        $this->set(compact('personasTitle', 'personas', 'titles'));
        $this->set('_serialize', ['personasTitle']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Personas Title id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $personasTitle = $this->PersonasTitles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $personasTitle = $this->PersonasTitles->patchEntity($personasTitle, $this->request->data);
            if ($this->PersonasTitles->save($personasTitle)) {
                $this->Flash->success(__('The personas title has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The personas title could not be saved. Please, try again.'));
            }
        }
        $personas = $this->PersonasTitles->Personas->find('list', ['limit' => 200]);
        $titles = $this->PersonasTitles->Titles->find('list', ['limit' => 200]);
        $this->set(compact('personasTitle', 'personas', 'titles'));
        $this->set('_serialize', ['personasTitle']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Personas Title id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $personasTitle = $this->PersonasTitles->get($id);
        if ($this->PersonasTitles->delete($personasTitle)) {
            $this->Flash->success(__('The personas title has been deleted.'));
        } else {
            $this->Flash->error(__('The personas title could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
