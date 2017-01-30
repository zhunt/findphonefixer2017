<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Malls Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Cities
 * @property \Cake\ORM\Association\HasMany $Venues
 *
 * @method \App\Model\Entity\Mall get($primaryKey, $options = [])
 * @method \App\Model\Entity\Mall newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Mall[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Mall|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Mall patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Mall[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Mall findOrCreate($search, callable $callback = null, $options = [])
 */
class MallsTable extends Table
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

        $this->table('malls');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('Cities', [
            'foreignKey' => 'city_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Venues', [
            'foreignKey' => 'mall_id'
        ]);

        $this->addBehavior('Muffin/Slug.Slug', []);
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
            ->requirePresence('seo_title', 'create')
            ->notEmpty('seo_title');

        $validator
            ->requirePresence('seo_desc', 'create')
            ->notEmpty('seo_desc');

        $validator
            ->requirePresence('intro_text', 'create')
            ->notEmpty('intro_text');

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
        $rules->add($rules->existsIn(['city_id'], 'Cities'));

        return $rules;
    }
}
