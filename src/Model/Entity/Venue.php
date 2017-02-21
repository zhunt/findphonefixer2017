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
 * @property string $photos
 * @property string $location_hours
 * @property int $country_id
 * @property int $province_id
 * @property int $city_region_id
 * @property float $geo_latt
 * @property float $geo_long
 * @property string $admin_level_2
 * @property bool $flag_mall
 * @property int $mall_id
 * @property int $chain_id
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
 * @property \App\Model\Entity\Chain $chain
 * @property \App\Model\Entity\Amenity[] $amenities
 * @property \App\Model\Entity\Brand[] $brands
 * @property \App\Model\Entity\Cuisine[] $cuisines
 * @property \App\Model\Entity\Product[] $products
 * @property \App\Model\Entity\Service[] $services
 * @property \App\Model\Entity\VenueType[] $venue_types
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
