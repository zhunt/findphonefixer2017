<?php
namespace App\Controller;

use App\Controller\AppController;

use Cake\ORM\TableRegistry;

use Cake\Utility\Hash;
use Cake\Utility\Text;

use League\Csv\Reader;


/**
 * Imports Controller
 *
 * @property \App\Model\Table\ImportsTable $Venues
 */
class ImportsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->loadModel('Venues');

        $this->paginate = [
            'contain' => ['Cities', 'Countries', 'Provinces', 'CityRegions', 'Malls', 'Chains']
        ];
        $venues = $this->paginate($this->Venues);

        $this->set(compact('venues'));
        $this->set('_serialize', ['venues']);
    }

    /**
     * View method
     *
     * @param string|null $id Import id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->loadModel('Venues');
        $import = $this->Venues->get($id, [
            'contain' => []
        ]);

        $this->set('import', $import);
        $this->set('_serialize', ['import']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->loadModel('Venues');

        $productList = $this->getServiceTypes('Fiverr_yyztech-1.csv');



        if ($this->request->is('post')) {
            debug($this->request->data);

            switch( $this->request->data['operation'][0] ){
                case 'add_products':
                    $productList = $this->getServiceTypes('Fiverr_yyztech-1.csv');
                    foreach ( $productList as $key => $value) {
                        if ( !empty($value ) ) {

                            // save data to both tables
                            $entity = $this->Venues->Products->newEntity( ['name' => $value] );
                            $this->Venues->Products->save($entity);
                            $entity = $this->Venues->Services->newEntity( ['name' => $value] );
                            $this->Venues->Services->save($entity);
                        }
                    }
                    break;

                case 'add_venues':

                    $data = $this->getVenuesList('Fiverr_yyztech-1.csv');
                    if ($data) {
                        $this->saveVenues($data);
                    }
                    break;


            }

        }



/*
        $import = $this->Venues->newEntity();
        if ($this->request->is('post')) {
            $import = $this->Venues->patchEntity($import, $this->request->data);
            if ($this->Venues->save($import)) {
                $this->Flash->success(__('The import has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The import could not be saved. Please, try again.'));
        }
        $this->set(compact('import'));
        $this->set('_serialize', ['import']);
      */
    }

    /**
     * Edit method
     *
     * @param string|null $id Import id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $import = $this->Venues->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $import = $this->Venues->patchEntity($import, $this->request->data);
            if ($this->Venues->save($import)) {
                $this->Flash->success(__('The import has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The import could not be saved. Please, try again.'));
        }
        $this->set(compact('import'));
        $this->set('_serialize', ['import']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Import id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $import = $this->Venues->get($id);
        if ($this->Venues->delete($import)) {
            $this->Flash->success(__('The import has been deleted.'));
        } else {
            $this->Flash->error(__('The import could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    public function getServiceTypes( $csvFile = 'Fiverr_yyztech-1.csv' ){

        $reader = Reader::createFromPath( WWW_ROOT . $csvFile);

        $reader->setOffset(2);

        $result = $reader->fetchColumn(1); // row with services/products/etc. in it
        $data = iterator_to_array($result, false);
        //debug($data);

        $newData = [];
        foreach ($data as $row) {
            $newData[] = array_map('trim',explode(",",$row));
        }

        $newData = array_unique(Hash::flatten($newData));
        $newData = array_values($newData);
        sort( $newData );

        /* returns something like
    (int) 0 => '',
	(int) 1 => 'Auto Parts & Supplies',
	(int) 2 => 'Battery Stores',
	(int) 3 => 'Computers',
	(int) 4 => 'Data Recovery',
	(int) 5 => 'Electrical Repairs',
	(int) 6 => 'Electronics',
	(int) 7 => 'IT Services & Computer & Laptop Repair',
	(int) 8 => 'Internet Service Providers',
	(int) 9 => 'Jewellery',
	(int) 10 => 'Mobile Phone Repair',
	(int) 11 => 'Mobile Phones',
	(int) 12 => 'Security Systems',
	(int) 13 => 'Telecommunications',
	(int) 14 => 'Watch Repair',
	(int) 15 => 'Watches'
         */

        return($newData);

    }

    public function getVenuesList( $csvFile = 'Fiverr_yyztech-1.csv' )
    {







        $reader = Reader::createFromPath(WWW_ROOT . $csvFile);

      //  $headers = $reader->fetchOne(); debug($headers);

        /* List of fields:
         (int) 0 => '﻿Source',
	(int) 1 => 'Category',
	(int) 2 => 'Name',
	(int) 3 => 'Address',
	(int) 4 => 'Location',
	(int) 5 => 'Phone',
	(int) 6 => 'Website',
	(int) 7 => 'Small Desc',
	(int) 8 => 'Long Desc',
	(int) 9 => 'Monday',
	(int) 10 => '',
	(int) 11 => 'Tuesday',
	(int) 12 => '',
	(int) 13 => 'Wednesday',
	(int) 14 => '',
	(int) 15 => 'Thursday',
	(int) 16 => '',
	(int) 17 => 'Friday',
	(int) 18 => '',
	(int) 19 => 'Saturday',
	(int) 20 => '',
	(int) 21 => 'Sunday',
	(int) 22 => ''

        ---

[
	(int) 0 => 'https://www.yelp.co.uk/biz/irevive-mobile-vancouver?osq=Mobile+Phone+Repair',
	(int) 1 => 'Electrical Repairs, Mobile Phone Repair',
	(int) 2 => 'iRevive Mobile',
	(int) 3 => '245 W Broadway
Vancouver , BC  V5Y 1P5
Canada',
	(int) 4 => 'Mount Pleasant',
	(int) 5 => '+1-778-804-8743',
	(int) 6 => 'http://www.irevivemobile.com',
	(int) 7 => 'iRevive Mobile specializes in the repair of Apple, Google, OnePlus, Sony, LG and Samsung cell phones and other touch screen devices. Unlike our competition, we allow you to relax as …',
	(int) 8 => 'Specialities                      iRevive Mobile specializes in the repair of Apple, Google, OnePlus, Sony, LG and Samsung cell phones and other touch screen devices. Unlike our competition, we allow you to relax as our repairs take place in your own home, office or favourite cafe! Currently, we are servicing repairs for the iPhone, iPad,  iPod Touch, the Samsung Galaxy line of devices, LG G2 and G3, Google Nexus 4 and 5, the OnePlus devices and the Sony Xperia line. We offer at-your-location service at no extra charge and proudly offer a 180-day guarantee on all Apple parts installed and 90 days for Androids. We are a local, home-grown operation and value our customer service above all else.

We offer incredibly competitive pricing, friendly to-your-doorstep service and we even accept payment via company cheques and credit card.

Thank you for supporting local business - we can&#39;t wait to help you out!                           History                                  Established in 2010.                                            We started business back in October of 2010 with one goal: we were going to provide Greater Vancouver with the most honest, reliable and fair-priced repairs. Something that seemed to be largely missing from this beautiful city of ours. Nearly three years and thousands of happy customers later, we find ourselves established as the most trustworthy name in the phone repair biz. Although we have recently incorporated and re-branded our company to become known as iRevive Mobile, we still offer the most competitive pricing with the best at-your-location service in the Lower Mainland. Expect big things from us in the future - we&#39;re here to stay! But more importantly, we&#39;re here to help.                               Meet the Business Owner                                                                                                                                                                                       Darcy P.                                                 Business Owner                                                              Darcy was born and raised in North Vancouver and has always dreamed of staying here to make his hometown a better place. He has worn many hats over the years including a professional 3D character artist in the videogame industry, a stand-up comic and a colourful Canucks fan. But as the owner and operator of iRevive Mobile, he takes great pride in knowing he can help out his fellow Vancouverites day in, day out.

His brother, Paul, now works proudly with him as his business partner and right-hand man. His aspirations in the world of music have seen him tour across the globe with an assortment of bands including dbs, The Red Light Sting and Owl Drugs. He has easily become one of the city&#39;s most accomplished drummers in the underground music scene. Ask him about his Gamelan performances!',
	(int) 9 => '10:00',
	(int) 10 => '18:00',
	(int) 11 => '10:00',
	(int) 12 => '18:00',
	(int) 13 => '10:00',
	(int) 14 => '18:00',
	(int) 15 => '10:00',
	(int) 16 => '18:00',
	(int) 17 => '10:00',
	(int) 18 => '18:00',
	(int) 19 => '10:00',
	(int) 20 => '18:00',
	(int) 21 => '12:00',
	(int) 22 => '17:00'
]


         * */

        //$result = $reader->setOffset(2)->setLimit(100)->fetchAll();

        $result = $reader->setOffset(30)->setLimit(100)->fetchAll();

       //$result = $reader->fetchColumn(2); // row with services/products/etc. in it

        //$res = $csv->setOffset(10)->setLimit(25)->fetchAll();

      //  $data = iterator_to_array($result, false);

        $venueData = [];

        $venuesTable = TableRegistry::get('Venues');

        foreach ($result as $row) {
           // debug($row);

            // check if the phone number is already present
            $count = $venuesTable->find()->where(['phones LIKE "%' .  $row[5] . '%"'] )->count();

            if ( $count > 0 ) {
                //debug('Skipping ' . $row[5]);
                continue;
            }


            // add more for cusinies, etc.
            $products = array_map('trim',explode(",",$row[1]));
            $services = array_map('trim',explode(",",$row[1]));

            $venueData[] =
            [
                'name' => $row[2],
                'address' => str_replace(array("\r", "\n"), ' ', $row[3]),
                'phone' => ['phone' => $row[5] ],
                'website' => [ 'url' => $row[6] ],
                'desc' =>  Text::slug($row[8], ['replacement' => ' '] ), //  preg_replace('/\s+/', ' ', str_replace(array("\r", "\n"), ' ', $row[8]) ),
                'hours' => [
                    'mon' => $row[9] . ' - ' . $row[10],
                    'tue' => $row[11] . ' - ' . $row[12],
                    'wed' => $row[13] . ' - ' . $row[14],
                    'thu' => $row[15] . ' - ' . $row[16],
                    'fri' => $row[17] . ' - ' . $row[18],
                    'sat' => $row[19] . ' - ' . $row[20],
                    'sun' => $row[21] . ' - ' . $row[22]
                ],
                'products' => $products,
                'services' => $services
            ];

        }

     /*
      *
        debug($name);
        debug($address);
        debug($phone);
        debug($website);
        debug($desc);
        debug($hours);
 */
       // debug($venueData); exit;
        return($venueData);
    }

    public function saveVenues($dataSet) {


        $this->loadComponent('Geocode');

        foreach ($dataSet as $data) {

            $geoData = $this->Geocode->geocodeAddress($data['address']);

            //debug($geoData); //exit;

            // venues
            $venuesTable = TableRegistry::get('Venues');


            $country = $venuesTable->Countries->findByName($geoData['country'])->first();
            if (!$country) {
                $country = $venuesTable->Countries->newEntity();
                $country->name = $geoData['country'];
                $country->slug = '';

                $venuesTable->Countries->save($country);
            }
            $countryId = $country->id;

            $province = $venuesTable->Provinces->findByNameAndCountryId($geoData['province'], $countryId)->first();
            if (!$province) {
                $province = $venuesTable->Provinces->newEntity();
                $province->name = $geoData['province'];
                $province->slug = '';
                $province->country_id = $countryId;

                $venuesTable->Provinces->save($province);
            }
            $provinceId = $province->id;

            $city = $venuesTable->Cities->findByNameAndProvinceId($geoData['city'], $provinceId)->first();
            if (!$city) {
                $city = $venuesTable->Cities->newEntity();
                $city->name = $geoData['city'];
                $city->slug = '';
                $city->province_id = $provinceId;
                $city->country_id = $countryId;
                $cityId = $venuesTable->Cities->save($city);
            }
            $cityId = $city->id;

            if ($geoData['cityRegion']) {
                $cityRegion = $venuesTable->CityRegions->findByNameAndCityId($geoData['cityRegion'], $cityId)->first();
                if (!$cityRegion) {
                    $cityRegion = $venuesTable->CityRegions->newEntity();
                    $cityRegion->name = $geoData['cityRegion'];
                    $cityRegion->slug = '';
                    $cityRegion->province_id = $provinceId;
                    $cityRegion->country_id = $countryId;
                    $cityRegion->city_id = $cityId;
                    $cityRegionId = $venuesTable->CityRegions->save($city);
                }
                $cityRegionId = $cityRegion->id;
            } else {
                $cityRegionId = false;
                $cityRegion = null;
            }


            $venue = $venuesTable->newEntity();

            $venue->name = $data['name'];
            $venue->flag_published = false;

            $venue->address = $data['address'];

            $venue->city = $city;
            $venue->province = $province;
            $venue->country = $country;
            $venue->city_region = $cityRegion;

            $venue->websites = $data['website'];
            $venue->phones = $data['phone'];
            $venue->location_hours = $data['hours'];
            $venue->seo_desc = $data['desc'];


            if ($venuesTable->save($venue, ['validate' => false])) {

                // add associations
                $venueType = $venuesTable->VenueTypes->findByName('Store')->first();
                $venuesTable->VenueTypes->link($venue, [$venueType]);

                // Add products
                if (!empty($data['products'])) {
                    foreach ($data['products'] as $i => $value) {
                        $result = $venuesTable->Products->findByName($value)->first();
                        if ($result) {
                            $products = $result;
                            $venuesTable->Products->link($venue, [$products]);
                        }
                    }
                }

                // Add services
                if (!empty($data['services'])) {
                    foreach ($data['services'] as $i => $value) {
                        $result = $venuesTable->Services->findByName($value)->first();
                        if ($result) {
                            $services = $result;
                            $venuesTable->Services->link($venue, [$services]);
                        }
                    }
                }
            }


        }



    }
}
