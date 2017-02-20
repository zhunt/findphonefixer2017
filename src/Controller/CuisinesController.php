<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Cuisines Controller
 *
 * @property \App\Model\Table\CuisinesTable $Cuisines
 */
class CuisinesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $cuisines = $this->paginate($this->Cuisines);

        $this->set(compact('cuisines'));
        $this->set('_serialize', ['cuisines']);
    }

    /**
     * View method
     *
     * @param string|null $id Cuisine id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cuisine = $this->Cuisines->get($id, [
            'contain' => ['Venues']
        ]);

        $this->set('cuisine', $cuisine);
        $this->set('_serialize', ['cuisine']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cuisine = $this->Cuisines->newEntity();
        if ($this->request->is('post')) {
            $cuisine = $this->Cuisines->patchEntity($cuisine, $this->request->data);
            if ($this->Cuisines->save($cuisine)) {
                $this->Flash->success(__('The cuisine has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cuisine could not be saved. Please, try again.'));
        }
        $venues = $this->Cuisines->Venues->find('list', ['limit' => 200]);
        $this->set(compact('cuisine', 'venues'));
        $this->set('_serialize', ['cuisine']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Cuisine id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cuisine = $this->Cuisines->get($id, [
            'contain' => ['Venues']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cuisine = $this->Cuisines->patchEntity($cuisine, $this->request->data);
            if ($this->Cuisines->save($cuisine)) {
                $this->Flash->success(__('The cuisine has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cuisine could not be saved. Please, try again.'));
        }
        $venues = $this->Cuisines->Venues->find('list', ['limit' => 200]);
        $this->set(compact('cuisine', 'venues'));
        $this->set('_serialize', ['cuisine']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Cuisine id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cuisine = $this->Cuisines->get($id);
        if ($this->Cuisines->delete($cuisine)) {
            $this->Flash->success(__('The cuisine has been deleted.'));
        } else {
            $this->Flash->error(__('The cuisine could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
