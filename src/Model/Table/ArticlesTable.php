<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


use Cake\Database\Schema\Table as Schema; // added for JSON

/**
 * Articles Model
 *
 * @method \App\Model\Entity\Article get($primaryKey, $options = [])
 * @method \App\Model\Entity\Article newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Article[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Article|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Article patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Article[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Article findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ArticlesTable extends Table
{

    // Added for JSON
    protected function _initializeSchema(Schema $schema)
    {
        $schema->columnType('tags', 'json');
        $schema->columnType('categories', 'json');
        return $schema;
    }


    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('articles');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->allowEmpty('seo_title');

        $validator
            ->allowEmpty('meta_desc');

        $validator
            ->allowEmpty('social_media_url');

        $validator
            ->allowEmpty('body');

        $validator
            ->allowEmpty('tags');

        $validator
            ->allowEmpty('homepage_image_url');

        $validator
            ->allowEmpty('homepage_text');

        $validator
            ->allowEmpty('categories');

        $validator
            ->boolean('flag_published')
            ->allowEmpty('flag_published');

        $validator
            ->date('publish_date')
            ->allowEmpty('publish_date');

        $validator
            ->dateTime('modifed')
            ->allowEmpty('modifed');

        return $validator;
    }
}
