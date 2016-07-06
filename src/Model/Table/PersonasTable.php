<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Personas Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Orks
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsTo $Vocations
 * @property \Cake\ORM\Association\BelongsTo $Monsters
 * @property \Cake\ORM\Association\BelongsTo $Npcs
 * @property \Cake\ORM\Association\BelongsTo $Parks
 * @property \Cake\ORM\Association\BelongsTo $Territories
 * @property \Cake\ORM\Association\BelongsTo $Actions
 * @property \Cake\ORM\Association\HasMany $Comments
 * @property \Cake\ORM\Association\HasMany $Fiefdoms
 * @property \Cake\ORM\Association\HasMany $Fieves
 * @property \Cake\ORM\Association\BelongsToMany $Actions
 * @property \Cake\ORM\Association\BelongsToMany $Equipments
 * @property \Cake\ORM\Association\BelongsToMany $Fieves
 * @property \Cake\ORM\Association\BelongsToMany $Titles
 *
 * @method \App\Model\Entity\Persona get($primaryKey, $options = [])
 * @method \App\Model\Entity\Persona newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Persona[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Persona|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Persona patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Persona[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Persona findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PersonasTable extends Table
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

        $this->table('personas');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Orks', [
            'foreignKey' => 'ork_id'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Vocations', [
            'foreignKey' => 'vocation_id'
        ]);
        $this->belongsTo('Monsters', [
            'foreignKey' => 'monster_id'
        ]);
        $this->belongsTo('Npcs', [
            'foreignKey' => 'npc_id'
        ]);
        $this->belongsTo('Parks', [
            'foreignKey' => 'park_id'
        ]);
        $this->belongsTo('Territories', [
            'foreignKey' => 'territory_id'
        ]);
        $this->belongsTo('Actions', [
            'foreignKey' => 'action_id'
        ]);
        $this->hasMany('Comments', [
            'foreignKey' => 'persona_id'
        ]);
        $this->hasMany('Fiefdoms', [
            'foreignKey' => 'persona_id'
        ]);
        $this->hasMany('Fieves', [
            'foreignKey' => 'persona_id'
        ]);
        $this->belongsToMany('Actions', [
            'foreignKey' => 'persona_id',
            'targetForeignKey' => 'action_id',
            'joinTable' => 'actions_personas'
        ]);
        $this->belongsToMany('Equipments', [
            'foreignKey' => 'persona_id',
            'targetForeignKey' => 'equipment_id',
            'joinTable' => 'equipments_personas'
        ]);
        $this->belongsToMany('Fieves', [
            'foreignKey' => 'persona_id',
            'targetForeignKey' => 'fief_id',
            'joinTable' => 'fieves_personas'
        ]);
        $this->belongsToMany('Titles', [
            'foreignKey' => 'persona_id',
            'targetForeignKey' => 'title_id',
            'joinTable' => 'personas_titles'
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
            ->requirePresence('long_name', 'create')
            ->notEmpty('long_name');

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
            ->allowEmpty('gold');

        $validator
            ->integer('iron')
            ->allowEmpty('iron');

        $validator
            ->integer('timber')
            ->allowEmpty('timber');

        $validator
            ->integer('stone')
            ->allowEmpty('stone');

        $validator
            ->integer('grain')
            ->allowEmpty('grain');

        $validator
            ->boolean('is_knight')
            ->requirePresence('is_knight', 'create')
            ->notEmpty('is_knight');

        $validator
            ->boolean('is_rebel')
            ->requirePresence('is_rebel', 'create')
            ->notEmpty('is_rebel');

        $validator
            ->boolean('is_monarch')
            ->requirePresence('is_monarch', 'create')
            ->notEmpty('is_monarch');

        $validator
            ->integer('fiefs_assigned')
            ->allowEmpty('fiefs_assigned');

        $validator
            ->dateTime('shattered')
            ->allowEmpty('shattered');

        $validator
            ->dateTime('deceased')
            ->allowEmpty('deceased');

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
        $rules->add($rules->existsIn(['ork_id'], 'Orks'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['vocation_id'], 'Vocations'));
        $rules->add($rules->existsIn(['monster_id'], 'Monsters'));
        $rules->add($rules->existsIn(['npc_id'], 'Npcs'));
        $rules->add($rules->existsIn(['park_id'], 'Parks'));
        $rules->add($rules->existsIn(['territory_id'], 'Territories'));
        $rules->add($rules->existsIn(['action_id'], 'Actions'));
        return $rules;
    }
}
