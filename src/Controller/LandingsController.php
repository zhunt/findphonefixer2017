<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Landings Controller
 *
 * @property \App\Model\Table\LandingsTable $Landings
 */
class LandingsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function home()
    {

        $this->viewBuilder()->layout('default');
        $landings = null; //$this->paginate($this->Landings);

        $this->set(compact('landings'));
        $this->set('_serialize', ['landings']);
    }

    /**
     * View method
     *
     * @param string|null $id Landing id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $landing = $this->Landings->get($id, [
            'contain' => []
        ]);

        $this->set('landing', $landing);
        $this->set('_serialize', ['landing']);
    }


}
