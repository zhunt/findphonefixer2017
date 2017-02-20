<?php
/**
 * Created by PhpStorm.
 * User: zoltan
 * Date: 2/12/2017
 * Time: 2:52 PM
 */

namespace App\Model\Behavior;

use Cake\Datasource\EntityInterface;
use Cake\Event\Event;
use Cake\ORM\Behavior;

use Cake\ORM\Entity;
use Cake\ORM\Query;
use Cake\Utility\Inflector;

//use League\Geotools\Geotools;
//use Geocoder\ProviderAggregator as Geocoder;

//use Ivory\HttpAdapter\HttpAdapterInterface;
//use Ivory\HttpAdapter\CurlHttpAdapter;

use Geo\Geocoder\Geocoder;



class GeocodeBehavior extends Behavior {

    protected $_defaultConfig = [
        'address_field' => 'address',
        'latt' => 'geo_latt',
        'long' => 'geo_long',
        'provinceRegion' => 'admin_level_2',
    ];

    //protected $geotools;

    public function initialize(array $config)
    {
        // Some initialization code here
        //$this->geotools = new Geotools();
    }

    /*
    public function slug(Entity $entity)
    {
        $config = $this->config();
        $value = $entity->get($config['field']);
        $entity->set($config['slug'], Inflector::slug($value, $config['replacement']));
    }
*/

    public function geocodeAddress($entity){

        $config = $this->config();
        $address = $entity->get($config['address_field']);

        // don't update if fields already populated
        if ( !empty($entity->get($config['latt']) ) || !empty( $entity->get($config['long'] ) ) ) {
            return;
        }



       // $address = '910 13th Ave, Brooklyn, NY 11228, USA';

        $this->Geocoder = new Geocoder();
        $this->Geocoder->config(['allowInconclusive' => true, 'minAccuracy' => Geocoder::TYPE_POSTAL]);
        $addresses = $this->Geocoder->geocode($address);

       // debug($addresses);

        if (!empty($addresses)) {
            $address = $addresses->first();
            $formatter = new \Geocoder\Formatter\StringFormatter();
            // see: http://geocoder-php.org/Geocoder/ for codes
            $country = $formatter->format($address, '%C');
            $city = $formatter->format($address, '%L');
            $cityRegion = $formatter->format($address, '%D');
            $province = $formatter->format($address, '%A1');
            $provinceRegion = $formatter->format($address, '%A2');
            $adminRegion3 = $formatter->format($address, '%A3');
            $adminRegion4 = $formatter->format($address, '%A4');
            $adminRegion5 = $formatter->format($address, '%A5');
            $geoLatt = $address->getLatitude();
            $geoLong = $address->getLongitude();




            /*
            debug($country);
            debug($city);
            debug($cityRegion);
            debug($province); // area 1
            debug($provinceRegion); // area 2
            debug($adminRegion3);
            debug($adminRegion4);
            debug($adminRegion5);
            debug($geoLatt);
            debug($geoLong);
*/



            $entity->set($config['latt'], $geoLatt);
            $entity->set($config['long'], $geoLong);
            $entity->set($config['provinceRegion'], $provinceRegion);

            debug('updated geo latt/long');

            //$entity->set($config['slug'], Inflector::slug($value, $config['replacement']));


        }

           // exit;

    }
    public function beforeSave(Event $event, EntityInterface $entity)
    {
        //$this->slug($entity);

        $this->geocodeAddress($entity);
    }


}