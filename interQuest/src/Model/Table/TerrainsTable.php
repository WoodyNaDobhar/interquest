<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Terrains Model
 *
 * @property \Cake\ORM\Association\HasMany $Territories
 *
 * @method \App\Model\Entity\Terrain get($primaryKey, $options = [])
 * @method \App\Model\Entity\Terrain newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Terrain[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Terrain|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Terrain patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Terrain[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Terrain findOrCreate($search, callable $callback = null)
 */
class TerrainsTable extends Table
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

        $this->table('terrains');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->hasMany('Territories', [
            'foreignKey' => 'terrain_id'
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
            ->requirePresence('description', 'create')
            ->notEmpty('description');

        $validator
            ->requirePresence('image', 'create')
            ->notEmpty('image');

        $validator
            ->requirePresence('color', 'create')
            ->notEmpty('color');

        return $validator;
    }
}
