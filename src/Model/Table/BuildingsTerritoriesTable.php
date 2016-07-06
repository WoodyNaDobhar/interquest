<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BuildingsTerritories Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Buildings
 * @property \Cake\ORM\Association\BelongsTo $Territories
 *
 * @method \App\Model\Entity\BuildingsTerritory get($primaryKey, $options = [])
 * @method \App\Model\Entity\BuildingsTerritory newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\BuildingsTerritory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\BuildingsTerritory|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BuildingsTerritory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\BuildingsTerritory[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\BuildingsTerritory findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class BuildingsTerritoriesTable extends Table
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

        $this->table('buildings_territories');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Buildings', [
            'foreignKey' => 'building_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Territories', [
            'foreignKey' => 'territory_id',
            'joinType' => 'INNER'
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
            ->allowEmpty('name');

        $validator
            ->integer('size')
            ->requirePresence('size', 'create')
            ->notEmpty('size');

        $validator
            ->dateTime('deleted')
            ->allowEmpty('deleted');

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
        $rules->add($rules->existsIn(['building_id'], 'Buildings'));
        $rules->add($rules->existsIn(['territory_id'], 'Territories'));
        return $rules;
    }
}
