<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Venues Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Cities
 * @property \Cake\ORM\Association\BelongsTo $Countries
 * @property \Cake\ORM\Association\BelongsTo $Provinces
 * @property \Cake\ORM\Association\BelongsTo $CityRegions
 * @property \Cake\ORM\Association\BelongsTo $Malls
 *
 * @method \App\Model\Entity\Venue get($primaryKey, $options = [])
 * @method \App\Model\Entity\Venue newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Venue[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Venue|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Venue patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Venue[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Venue findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class VenuesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->addBehavior('Muffin/Slug.Slug'); // put this up top to work properly
        $this->addBehavior('Geocode', ['field' => 'name']);


        $this->table('venues');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Cities', [
            'foreignKey' => 'city_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Countries', [
            'foreignKey' => 'country_id'
        ]);
        $this->belongsTo('Provinces', [
            'foreignKey' => 'province_id'
        ]);
        $this->belongsTo('CityRegions', [
            'foreignKey' => 'city_region_id'
        ]);
        $this->belongsTo('Malls', [
            'foreignKey' => 'mall_id'
        ]);


    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->requirePresence('slug', 'create')
            ->allowEmpty('slug', 'create');

        $validator
            ->allowEmpty('seo_title');

        $validator
            ->allowEmpty('seo_desc');

        $validator
            ->allowEmpty('address');

        $validator
            ->allowEmpty('phones');

        $validator
            ->allowEmpty('websites');

        $validator
            ->allowEmpty('amenities');

        $validator
            ->allowEmpty('features');

        $validator
            ->allowEmpty('services');

        $validator
            ->allowEmpty('products');

        $validator
            ->allowEmpty('photos');

        $validator
            ->numeric('geo_latt')
            ->allowEmpty('geo_latt');

        $validator
            ->numeric('geo_long')
            ->allowEmpty('geo_long');

        $validator
            ->allowEmpty('admin_level_2');

        $validator
            ->boolean('flag_mall')
            ->allowEmpty('flag_mall');

        $validator
            ->dateTime('last_update')
            ->allowEmpty('last_update');

        $validator
            ->boolean('flag_featured')
            ->allowEmpty('flag_featured');

        $validator
            ->numeric('rating')
            ->allowEmpty('rating');

        $validator
            ->boolean('flag_published')
            ->requirePresence('flag_published', 'create')
            ->notEmpty('flag_published');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        /*
        $rules->add($rules->existsIn(['city_id'], 'Cities'));
        $rules->add($rules->existsIn(['country_id'], 'Countries'));
        $rules->add($rules->existsIn(['province_id'], 'Provinces'));
        $rules->add($rules->existsIn(['city_region_id'], 'CityRegions'));
        $rules->add($rules->existsIn(['mall_id'], 'Malls'));
*/
        return $rules;

    }
}
