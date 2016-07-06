<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * BuildingsTerritories Controller
 *
 * @property \App\Model\Table\BuildingsTerritoriesTable $BuildingsTerritories
 */
class BuildingsTerritoriesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Buildings', 'Territories']
        ];
        $buildingsTerritories = $this->paginate($this->BuildingsTerritories);

        $this->set(compact('buildingsTerritories'));
        $this->set('_serialize', ['buildingsTerritories']);
    }

    /**
     * View method
     *
     * @param string|null $id Buildings Territory id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $buildingsTerritory = $this->BuildingsTerritories->get($id, [
            'contain' => ['Buildings', 'Territories']
        ]);

        $this->set('buildingsTerritory', $buildingsTerritory);
        $this->set('_serialize', ['buildingsTerritory']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $buildingsTerritory = $this->BuildingsTerritories->newEntity();
        if ($this->request->is('post')) {
            $buildingsTerritory = $this->BuildingsTerritories->patchEntity($buildingsTerritory, $this->request->data);
            if ($this->BuildingsTerritories->save($buildingsTerritory)) {
                $this->Flash->success(__('The buildings territory has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The buildings territory could not be saved. Please, try again.'));
            }
        }
        $buildings = $this->BuildingsTerritories->Buildings->find('list', ['limit' => 200]);
        $territories = $this->BuildingsTerritories->Territories->find('list', ['limit' => 200]);
        $this->set(compact('buildingsTerritory', 'buildings', 'territories'));
        $this->set('_serialize', ['buildingsTerritory']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Buildings Territory id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $buildingsTerritory = $this->BuildingsTerritories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $buildingsTerritory = $this->BuildingsTerritories->patchEntity($buildingsTerritory, $this->request->data);
            if ($this->BuildingsTerritories->save($buildingsTerritory)) {
                $this->Flash->success(__('The buildings territory has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The buildings territory could not be saved. Please, try again.'));
            }
        }
        $buildings = $this->BuildingsTerritories->Buildings->find('list', ['limit' => 200]);
        $territories = $this->BuildingsTerritories->Territories->find('list', ['limit' => 200]);
        $this->set(compact('buildingsTerritory', 'buildings', 'territories'));
        $this->set('_serialize', ['buildingsTerritory']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Buildings Territory id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $buildingsTerritory = $this->BuildingsTerritories->get($id);
        if ($this->BuildingsTerritories->delete($buildingsTerritory)) {
            $this->Flash->success(__('The buildings territory has been deleted.'));
        } else {
            $this->Flash->error(__('The buildings territory could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
