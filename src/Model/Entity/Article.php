<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Article Entity
 *
 * @property int $id
 * @property string $name
 * @property string $seo_title
 * @property string $meta_desc
 * @property string $social_media_url
 * @property string $body
 * @property $tags
 * @property string $homepage_image_url
 * @property string $homepage_text
 * @property $categories
 * @property bool $flag_published
 * @property \Cake\I18n\Time $publish_date
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modifed
 */
class Article extends Entity
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
