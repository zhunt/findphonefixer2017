<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Venue Entity
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $seo_title
 * @property string $seo_desc
 * @property string $address
 * @property int $city_id
 * @property string $phones
 * @property string $websites
 * @property string $amenities
 * @property string $features
 * @property string $services
 * @property string $products
 * @property string $photos
 * @property int $country_id
 * @property int $province_id
 * @property int $city_region_id
 * @property float $geo_latt
 * @property float $geo_long
 * @property string $admin_level_2
 * @property bool $flag_mall
 * @property int $mall_id
 * @property \Cake\I18n\Time $last_update
 * @property bool $flag_featured
 * @property float $rating
 * @property bool $flag_published
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\City $city
 * @property \App\Model\Entity\Country $country
 * @property \App\Model\Entity\Province $province
 * @property \App\Model\Entity\CityRegion $city_region
 * @property \App\Model\Entity\Mall $mall
 */
class Venue extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
