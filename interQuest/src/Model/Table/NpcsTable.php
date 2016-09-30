<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Npcs Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Vocations
 * @property \Cake\ORM\Association\BelongsTo $Monsters
 * @property \Cake\ORM\Association\BelongsTo $Territories
 * @property \Cake\ORM\Association\BelongsTo $Actions
 * @property \Cake\ORM\Association\HasMany $Comments
 * @property \Cake\ORM\Association\HasMany $Fiefdoms
 * @property \Cake\ORM\Association\HasMany $Fieves
 * @property \Cake\ORM\Association\HasMany $Personas
 * @property \Cake\ORM\Association\BelongsToMany $Equipments
 * @property \Cake\ORM\Association\BelongsToMany $Fieves
 *
 * @method \App\Model\Entity\Npc get($primaryKey, $options = [])
 * @method \App\Model\Entity\Npc newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Npc[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Npc|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Npc patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Npc[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Npc findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class NpcsTable extends Table
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

        $this->table('npcs');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Vocations', [
            'foreignKey' => 'vocation_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Monsters', [
            'foreignKey' => 'monster_id'
        ]);
        $this->belongsTo('Territories', [
            'foreignKey' => 'territory_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Actions', [
            'foreignKey' => 'action_id'
        ]);
        $this->hasMany('Comments', [
            'foreignKey' => 'npc_id'
        ]);
        $this->hasMany('Fiefdoms', [
            'foreignKey' => 'npc_id'
        ]);
        $this->hasMany('Fieves', [
            'foreignKey' => 'npc_id'
        ]);
        $this->hasMany('Personas', [
            'foreignKey' => 'npc_id'
        ]);
        $this->belongsToMany('Equipments', [
            'foreignKey' => 'npc_id',
            'targetForeignKey' => 'equipment_id',
            'joinTable' => 'equipments_npcs'
        ]);
        $this->belongsToMany('Fieves', [
            'foreignKey' => 'npc_id',
            'targetForeignKey' => 'fief_id',
            'joinTable' => 'fieves_npcs'
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
            ->allowEmpty('private_name');

        $validator
            ->requirePresence('image', 'create')
            ->notEmpty('image');

        $validator
            ->requirePresence('background_public', 'create')
            ->notEmpty('background_public');

        $validator
            ->requirePresence('background_private', 'create')
            ->notEmpty('background_private');

        $validator
            ->integer('gold')
            ->requirePresence('gold', 'create')
            ->notEmpty('gold');

        $validator
            ->integer('iron')
            ->requirePresence('iron', 'create')
            ->notEmpty('iron');

        $validator
            ->integer('timber')
            ->requirePresence('timber', 'create')
            ->notEmpty('timber');

        $validator
            ->integer('stone')
            ->requirePresence('stone', 'create')
            ->notEmpty('stone');

        $validator
            ->integer('grain')
            ->requirePresence('grain', 'create')
            ->notEmpty('grain');

        $validator
            ->dateTime('deceased')
            ->allowEmpty('deceased');

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
        $rules->add($rules->existsIn(['vocation_id'], 'Vocations'));
        $rules->add($rules->existsIn(['monster_id'], 'Monsters'));
        $rules->add($rules->existsIn(['territory_id'], 'Territories'));
        $rules->add($rules->existsIn(['action_id'], 'Actions'));

        return $rules;
    }
}
