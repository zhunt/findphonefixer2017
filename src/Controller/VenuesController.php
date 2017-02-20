<?php
namespace App\Controller;

use App\Controller\AppController;

use Cake\ORM\TableRegistry;

use Cake\Utility\Text; // for slugging


/**
 * Venues Controller
 *
 * @property \App\Model\Table\VenuesTable $Venues
 */
class VenuesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Cities', 'Countries', 'Provinces', 'CityRegions', 'Malls']
        ];
        $venues = $this->paginate($this->Venues);

        $this->set(compact('venues'));
        $this->set('_serialize', ['venues']);
    }

    /**
     * View method
     *
     * @param string|null $id Venue id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $venue = $this->Venues->get($id, [
            'contain' => ['Cities', 'Countries', 'Provinces', 'CityRegions', 'Malls']
        ]);

        $this->set('venue', $venue);
        $this->set('_serialize', ['venue']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $venue = $this->Venues->newEntity();
        if ($this->request->is('post')) {
            $venue = $this->Venues->patchEntity($venue, $this->request->data);
            if ($this->Venues->save($venue)) {
                $this->Flash->success(__('The venue has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The venue could not be saved. Please, try again.'));
        }
        $cities = $this->Venues->Cities->find('list', ['limit' => 200]);
        $countries = $this->Venues->Countries->find('list', ['limit' => 200]);
        $provinces = $this->Venues->Provinces->find('list', ['limit' => 200]);
        $cityRegions = $this->Venues->CityRegions->find('list', ['limit' => 200]);
        $malls = $this->Venues->Malls->find('list', ['limit' => 200]);
        $this->set(compact('venue', 'cities', 'countries', 'provinces', 'cityRegions', 'malls'));
        $this->set('_serialize', ['venue']);
    }


    public function testAdd() {

        $data = [
          'name' => "The Danforth Music Hall", // use this
            'country' => 'Canada',
            'province' => 'Ontario',
            'city' => 'Barrie',
            'address' => ' 147 Danforth Ave, Toronto, ON M4K 1N2' // use this
        ];

        $this->loadComponent('Geocode');
        $geoData = $this->Geocode->geocodeAddress( $data['address']);

        debug($geoData); //exit;

        // venues
        $venuesTable = TableRegistry::get('Venues');



        $country = $venuesTable->Countries->findByName( $geoData['country'] )->first();
        if (!$country){
            $country = $venuesTable->Countries->newEntity();
            $country->name = $geoData['country'];
            $country->slug = '';

            $venuesTable->Countries->save($country);
        }
        $countryId = $country->id;

        $province = $venuesTable->Provinces->findByNameAndCountryId($geoData['province'], $countryId )->first();
        if (!$province){
            $province = $venuesTable->Provinces->newEntity();
            $province->name = $geoData['province'];
            $province->slug = '';
            $province->country_id = $countryId;

            $venuesTable->Provinces->save($province);
        }
        $provinceId =  $province->id;

        $city = $venuesTable->Cities->findByNameAndProvinceId($geoData['city'], $provinceId)->first();
        if (!$city){
            $city = $venuesTable->Cities->newEntity();
            $city->name = $geoData['city'];
            $city->slug = '';
            $city->province_id = $provinceId;
            $city->country_id = $countryId;
            $cityId = $venuesTable->Cities->save($city);
        }
        $cityId = $city->id;

        if ($geoData['cityRegion']) {
            $cityRegion = $venuesTable->CityRegions->findByNameAndCityId( $geoData['cityRegion'], $cityId )->first();
            if (!$cityRegion){
                $cityRegion = $venuesTable->CityRegions->newEntity();
                $cityRegion->name = $geoData['cityRegion'];
                $cityRegion->slug = '';
                $cityRegion->province_id = $provinceId;
                $cityRegion->country_id = $countryId;
                $cityRegion->city_id = $cityId;
                $cityRegionId = $venuesTable->CityRegions->save($city);
            }
            $cityRegionId = $cityRegion->id;
        } else{
            $cityRegionId = false;
        }


        $venue = $venuesTable->newEntity();
        $venue->name = $data['name'];
        $venue->flag_published = false;

        $venue->address = $data['address'];

        $venue->city = $city;
        $venue->province = $province;
        $venue->country = $country;
        $venue->city_region = $cityRegion;



        debug($venue);

        if ($venuesTable->save($venue, ['validate' => false] )) {

            $this->Flash->success(__('The venue has been saved.'));

            // return $this->redirect(['action' => 'index']);
        }else {
            $this->Flash->error(__('The venue could not be saved. Please, try again.'));
        }

    }

    /*
     * quick add
     * - just add name, address of venue, handle geo-coding
     */
    public function quickAdd()
    {

        $venue = $this->Venues->newEntity();

       // $venue = $this->Venues->newEntity(['validate' => false]);
        if ($this->request->is('post')) {
          //  $this->request->data['name'] = 1;
          //  $this->request->data['province_id'] = 1;
          //  $this->request->data['cities'] = [ 'name' => 'Barrie'];
          //  $this->request->data['provinces'] = [ 'name' => 'Quebec'];
         //   $venue = $this->Venues->patchEntity($venue, $this->request->data);

          //  debug( $this->request->data);
          //  debug($venue);

            // ----------
            $this->loadComponent('Geocode');
            $geoData = $this->Geocode->geocodeAddress( $this->request->data['address']);

            //debug($geoData); //exit;

            // venues
            $venuesTable = TableRegistry::get('Venues');



            $country = $venuesTable->Countries->findByName( $geoData['country'] )->first();
            if (!$country){
                $country = $venuesTable->Countries->newEntity();
                $country->name = $geoData['country'];
                $country->slug = '';

                $venuesTable->Countries->save($country);
            }
            $countryId = $country->id;

            $province = $venuesTable->Provinces->findByNameAndCountryId($geoData['province'], $countryId )->first();
            if (!$province){
                $province = $venuesTable->Provinces->newEntity();
                $province->name = $geoData['province'];
                $province->slug = '';
                $province->country_id = $countryId;

                $venuesTable->Provinces->save($province);
            }
            $provinceId =  $province->id;

            $city = $venuesTable->Cities->findByNameAndProvinceId($geoData['city'], $provinceId)->first();
            if (!$city){
                $city = $venuesTable->Cities->newEntity();
                $city->name = $geoData['city'];
                $city->slug = '';
                $city->province_id = $provinceId;
                $city->country_id = $countryId;
                $cityId = $venuesTable->Cities->save($city);
            }
            $cityId = $city->id;

            if ($geoData['cityRegion']) {
                $cityRegion = $venuesTable->CityRegions->findByNameAndCityId( $geoData['cityRegion'], $cityId )->first();
                if (!$cityRegion){
                    $cityRegion = $venuesTable->CityRegions->newEntity();
                    $cityRegion->name = $geoData['cityRegion'];
                    $cityRegion->slug = '';
                    $cityRegion->province_id = $provinceId;
                    $cityRegion->country_id = $countryId;
                    $cityRegion->city_id = $cityId;
                    $cityRegionId = $venuesTable->CityRegions->save($city);
                }
                $cityRegionId = $cityRegion->id;
            } else{
                $cityRegionId = false;
                $cityRegion = null;
            }


            $venue = $venuesTable->newEntity();
            $venue->name = trim($this->request->data['name']);
            $venue->flag_published = $this->request->data['flag_published'];
            $venue->mall_id = $this->request->data['mall_id'];

            $venue->address = $this->request->data['address'];

            $venue->city = $city;
            $venue->province = $province;
            $venue->country = $country;
            $venue->city_region = $cityRegion;


            if ($this->Venues->save($venue)) {
                $this->Flash->success(__('The venue has been saved.'));

               return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The venue could not be saved. Please, try again.'));
        }
       // $cities = $this->Venues->Cities->find('list', ['limit' => 200]);
       // $countries = $this->Venues->Countries->find('list', ['limit' => 200]);
       // $provinces = $this->Venues->Provinces->find('list', ['limit' => 200]);
       // $cityRegions = $this->Venues->CityRegions->find('list', ['limit' => 200]);

        $malls = $this->Venues->Malls->find('list', ['limit' => 200]);
        $this->set(compact('venue', 'cities', 'countries', 'provinces', 'cityRegions', 'malls'));
        $this->set('_serialize', ['venue']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Venue id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $venue = $this->Venues->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $venue = $this->Venues->patchEntity($venue, $this->request->data);
            if ($this->Venues->save($venue)) {
                $this->Flash->success(__('The venue has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The venue could not be saved. Please, try again.'));
        }
        $cities = $this->Venues->Cities->find('list', ['limit' => 200]);
        $countries = $this->Venues->Countries->find('list', ['limit' => 200]);
        $provinces = $this->Venues->Provinces->find('list', ['limit' => 200]);
        $cityRegions = $this->Venues->CityRegions->find('list', ['limit' => 200]);
        $malls = $this->Venues->Malls->find('list', ['limit' => 200]);
        $this->set(compact('venue', 'cities', 'countries', 'provinces', 'cityRegions', 'malls'));
        $this->set('_serialize', ['venue']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Venue id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $venue = $this->Venues->get($id);
        if ($this->Venues->delete($venue)) {
            $this->Flash->success(__('The venue has been deleted.'));
        } else {
            $this->Flash->error(__('The venue could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
