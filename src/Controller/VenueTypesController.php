<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * VenueTypes Controller
 *
 * @property \App\Model\Table\VenueTypesTable $VenueTypes
 */
class VenueTypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $venueTypes = $this->paginate($this->VenueTypes);

        $this->set(compact('venueTypes'));
        $this->set('_serialize', ['venueTypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Venue Type id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $venueType = $this->VenueTypes->get($id, [
            'contain' => ['Venues']
        ]);

        $this->set('venueType', $venueType);
        $this->set('_serialize', ['venueType']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $venueType = $this->VenueTypes->newEntity();
        if ($this->request->is('post')) {
            $venueType = $this->VenueTypes->patchEntity($venueType, $this->request->data);
            if ($this->VenueTypes->save($venueType)) {
                $this->Flash->success(__('The venue type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The venue type could not be saved. Please, try again.'));
        }
        $venues = $this->VenueTypes->Venues->find('list', ['limit' => 200]);
        $this->set(compact('venueType', 'venues'));
        $this->set('_serialize', ['venueType']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Venue Type id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $venueType = $this->VenueTypes->get($id, [
            'contain' => ['Venues']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $venueType = $this->VenueTypes->patchEntity($venueType, $this->request->data);
            if ($this->VenueTypes->save($venueType)) {
                $this->Flash->success(__('The venue type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The venue type could not be saved. Please, try again.'));
        }
        $venues = $this->VenueTypes->Venues->find('list', [ 'valueField' => 'id', 'valueField' => 'name', 'limit' => 200]);
        $this->set(compact('venueType', 'venues'));
        $this->set('_serialize', ['venueType']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Venue Type id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $venueType = $this->VenueTypes->get($id);
        if ($this->VenueTypes->delete($venueType)) {
            $this->Flash->success(__('The venue type has been deleted.'));
        } else {
            $this->Flash->error(__('The venue type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
