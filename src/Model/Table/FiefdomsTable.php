<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Fiefdoms Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Personas
 * @property \Cake\ORM\Association\BelongsTo $Npcs
 * @property \Cake\ORM\Association\BelongsTo $Parks
 * @property \Cake\ORM\Association\HasMany $Fieves
 *
 * @method \App\Model\Entity\Fiefdom get($primaryKey, $options = [])
 * @method \App\Model\Entity\Fiefdom newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Fiefdom[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Fiefdom|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Fiefdom patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Fiefdom[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Fiefdom findOrCreate($search, callable $callback = null)
 */
class FiefdomsTable extends Table
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

        $this->table('fiefdoms');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('Personas', [
            'foreignKey' => 'persona_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Npcs', [
            'foreignKey' => 'npc_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Parks', [
            'foreignKey' => 'park_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Fieves', [
            'foreignKey' => 'fiefdom_id'
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
        $rules->add($rules->existsIn(['persona_id'], 'Personas'));
        $rules->add($rules->existsIn(['npc_id'], 'Npcs'));
        $rules->add($rules->existsIn(['park_id'], 'Parks'));
        return $rules;
    }
}
