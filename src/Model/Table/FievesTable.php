<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Fieves Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Territories
 * @property \Cake\ORM\Association\BelongsTo $Fiefdoms
 * @property \Cake\ORM\Association\BelongsTo $Personas
 * @property \Cake\ORM\Association\BelongsTo $Npcs
 * @property \Cake\ORM\Association\BelongsToMany $Npcs
 * @property \Cake\ORM\Association\BelongsToMany $Personas
 *
 * @method \App\Model\Entity\Fief get($primaryKey, $options = [])
 * @method \App\Model\Entity\Fief newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Fief[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Fief|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Fief patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Fief[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Fief findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class FievesTable extends Table
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

        $this->table('fieves');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Territories', [
            'foreignKey' => 'territory_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Fiefdoms', [
            'foreignKey' => 'fiefdom_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Personas', [
            'foreignKey' => 'persona_id'
        ]);
        $this->belongsTo('Npcs', [
            'foreignKey' => 'npc_id'
        ]);
        $this->belongsToMany('Npcs', [
            'foreignKey' => 'fief_id',
            'targetForeignKey' => 'npc_id',
            'joinTable' => 'fieves_npcs'
        ]);
        $this->belongsToMany('Personas', [
            'foreignKey' => 'fief_id',
            'targetForeignKey' => 'persona_id',
            'joinTable' => 'fieves_personas'
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
        $rules->add($rules->existsIn(['territory_id'], 'Territories'));
        $rules->add($rules->existsIn(['fiefdom_id'], 'Fiefdoms'));
        $rules->add($rules->existsIn(['persona_id'], 'Personas'));
        $rules->add($rules->existsIn(['npc_id'], 'Npcs'));
        return $rules;
    }
}
