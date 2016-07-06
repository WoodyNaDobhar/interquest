<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Buildings Model
 *
 * @property \Cake\ORM\Association\HasMany $Equipments
 * @property \Cake\ORM\Association\BelongsToMany $Territories
 *
 * @method \App\Model\Entity\Building get($primaryKey, $options = [])
 * @method \App\Model\Entity\Building newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Building[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Building|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Building patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Building[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Building findOrCreate($search, callable $callback = null)
 */
class BuildingsTable extends Table
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

        $this->table('buildings');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->hasMany('Equipments', [
            'foreignKey' => 'building_id'
        ]);
        $this->belongsToMany('Territories', [
            'foreignKey' => 'building_id',
            'targetForeignKey' => 'territory_id',
            'joinTable' => 'buildings_territories'
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
            ->integer('cost_gold')
            ->requirePresence('cost_gold', 'create')
            ->notEmpty('cost_gold');

        $validator
            ->integer('cost_iron')
            ->requirePresence('cost_iron', 'create')
            ->notEmpty('cost_iron');

        $validator
            ->integer('cost_timber')
            ->requirePresence('cost_timber', 'create')
            ->notEmpty('cost_timber');

        $validator
            ->integer('cost_stone')
            ->requirePresence('cost_stone', 'create')
            ->notEmpty('cost_stone');

        $validator
            ->integer('cost_grain')
            ->requirePresence('cost_grain', 'create')
            ->notEmpty('cost_grain');

        $validator
            ->integer('cost_actions')
            ->requirePresence('cost_actions', 'create')
            ->notEmpty('cost_actions');

        $validator
            ->integer('size_maximum')
            ->allowEmpty('size_maximum');

        $validator
            ->integer('builds_maximum')
            ->allowEmpty('builds_maximum');

        $validator
            ->boolean('requires_castle')
            ->allowEmpty('requires_castle');

        return $validator;
    }
}
