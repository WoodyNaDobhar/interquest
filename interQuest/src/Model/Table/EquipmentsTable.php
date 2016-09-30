<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Equipments Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Buildings
 * @property \Cake\ORM\Association\BelongsToMany $Npcs
 * @property \Cake\ORM\Association\BelongsToMany $Personas
 *
 * @method \App\Model\Entity\Equipment get($primaryKey, $options = [])
 * @method \App\Model\Entity\Equipment newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Equipment[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Equipment|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Equipment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Equipment[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Equipment findOrCreate($search, callable $callback = null)
 */
class EquipmentsTable extends Table
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

        $this->table('equipments');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('Buildings', [
            'foreignKey' => 'building_id'
        ]);
        $this->belongsToMany('Npcs', [
            'foreignKey' => 'equipment_id',
            'targetForeignKey' => 'npc_id',
            'joinTable' => 'equipments_npcs'
        ]);
        $this->belongsToMany('Personas', [
            'foreignKey' => 'equipment_id',
            'targetForeignKey' => 'persona_id',
            'joinTable' => 'equipments_personas'
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
            ->integer('price')
            ->requirePresence('price', 'create')
            ->notEmpty('price');

        $validator
            ->integer('units')
            ->allowEmpty('units');

        $validator
            ->requirePresence('description', 'create')
            ->notEmpty('description');

        $validator
            ->decimal('weight')
            ->requirePresence('weight', 'create')
            ->notEmpty('weight');

        $validator
            ->integer('cargo')
            ->allowEmpty('cargo');

        $validator
            ->decimal('craft_gold')
            ->allowEmpty('craft_gold');

        $validator
            ->decimal('craft_iron')
            ->allowEmpty('craft_iron');

        $validator
            ->decimal('craft_timber')
            ->allowEmpty('craft_timber');

        $validator
            ->decimal('craft_stone')
            ->allowEmpty('craft_stone');

        $validator
            ->decimal('craft_grain')
            ->allowEmpty('craft_grain');

        $validator
            ->integer('craft_actions')
            ->allowEmpty('craft_actions');

        $validator
            ->boolean('is_artifact')
            ->requirePresence('is_artifact', 'create')
            ->notEmpty('is_artifact');

        $validator
            ->boolean('is_relic')
            ->requirePresence('is_relic', 'create')
            ->notEmpty('is_relic');

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

        return $rules;
    }
}
