<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * FievesPersonas Controller
 *
 * @property \App\Model\Table\FievesPersonasTable $FievesPersonas
 */
class FievesPersonasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Fieves', 'Personas']
        ];
        $fievesPersonas = $this->paginate($this->FievesPersonas);

        $this->set(compact('fievesPersonas'));
        $this->set('_serialize', ['fievesPersonas']);
    }

    /**
     * View method
     *
     * @param string|null $id Fieves Persona id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $fievesPersona = $this->FievesPersonas->get($id, [
            'contain' => ['Fieves', 'Personas']
        ]);

        $this->set('fievesPersona', $fievesPersona);
        $this->set('_serialize', ['fievesPersona']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $fievesPersona = $this->FievesPersonas->newEntity();
        if ($this->request->is('post')) {
            $fievesPersona = $this->FievesPersonas->patchEntity($fievesPersona, $this->request->data);
            if ($this->FievesPersonas->save($fievesPersona)) {
                $this->Flash->success(__('The fieves persona has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The fieves persona could not be saved. Please, try again.'));
            }
        }
        $fieves = $this->FievesPersonas->Fieves->find('list', ['limit' => 200]);
        $personas = $this->FievesPersonas->Personas->find('list', ['limit' => 200]);
        $this->set(compact('fievesPersona', 'fieves', 'personas'));
        $this->set('_serialize', ['fievesPersona']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Fieves Persona id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $fievesPersona = $this->FievesPersonas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fievesPersona = $this->FievesPersonas->patchEntity($fievesPersona, $this->request->data);
            if ($this->FievesPersonas->save($fievesPersona)) {
                $this->Flash->success(__('The fieves persona has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The fieves persona could not be saved. Please, try again.'));
            }
        }
        $fieves = $this->FievesPersonas->Fieves->find('list', ['limit' => 200]);
        $personas = $this->FievesPersonas->Personas->find('list', ['limit' => 200]);
        $this->set(compact('fievesPersona', 'fieves', 'personas'));
        $this->set('_serialize', ['fievesPersona']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Fieves Persona id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $fievesPersona = $this->FievesPersonas->get($id);
        if ($this->FievesPersonas->delete($fievesPersona)) {
            $this->Flash->success(__('The fieves persona has been deleted.'));
        } else {
            $this->Flash->error(__('The fieves persona could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
