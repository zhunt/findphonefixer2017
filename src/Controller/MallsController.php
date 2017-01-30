<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Malls Controller
 *
 * @property \App\Model\Table\MallsTable $Malls
 */
class MallsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Cities']
        ];
        $malls = $this->paginate($this->Malls);

        $this->set(compact('malls'));
        $this->set('_serialize', ['malls']);
    }

    /**
     * View method
     *
     * @param string|null $id Mall id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $mall = $this->Malls->get($id, [
            'contain' => ['Cities', 'Venues']
        ]);

        $this->set('mall', $mall);
        $this->set('_serialize', ['mall']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $mall = $this->Malls->newEntity();
        if ($this->request->is('post')) {
            $mall = $this->Malls->patchEntity($mall, $this->request->data);
            if ($this->Malls->save($mall)) {
                $this->Flash->success(__('The mall has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mall could not be saved. Please, try again.'));
        }
        $cities = $this->Malls->Cities->find('list', ['limit' => 200]);
        $this->set(compact('mall', 'cities'));
        $this->set('_serialize', ['mall']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Mall id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $mall = $this->Malls->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $mall = $this->Malls->patchEntity($mall, $this->request->data);
            if ($this->Malls->save($mall)) {
                $this->Flash->success(__('The mall has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mall could not be saved. Please, try again.'));
        }
        $cities = $this->Malls->Cities->find('list', ['limit' => 200]);
        $this->set(compact('mall', 'cities'));
        $this->set('_serialize', ['mall']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Mall id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $mall = $this->Malls->get($id);
        if ($this->Malls->delete($mall)) {
            $this->Flash->success(__('The mall has been deleted.'));
        } else {
            $this->Flash->error(__('The mall could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
