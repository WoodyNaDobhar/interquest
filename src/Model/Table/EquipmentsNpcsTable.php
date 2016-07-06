<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * EquipmentsNpcs Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Equipments
 * @property \Cake\ORM\Association\BelongsTo $Npcs
 * @property \Cake\ORM\Association\BelongsTo $Territories
 *
 * @method \App\Model\Entity\EquipmentsNpc get($primaryKey, $options = [])
 * @method \App\Model\Entity\EquipmentsNpc newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\EquipmentsNpc[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\EquipmentsNpc|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EquipmentsNpc patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\EquipmentsNpc[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\EquipmentsNpc findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EquipmentsNpcsTable extends Table
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

        $this->table('equipments_npcs');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Equipments', [
            'foreignKey' => 'equipment_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Npcs', [
            'foreignKey' => 'npc_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Territories', [
            'foreignKey' => 'territory_id'
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
        $rules->add($rules->existsIn(['equipment_id'], 'Equipments'));
        $rules->add($rules->existsIn(['npc_id'], 'Npcs'));
        $rules->add($rules->existsIn(['territory_id'], 'Territories'));
        return $rules;
    }
}
