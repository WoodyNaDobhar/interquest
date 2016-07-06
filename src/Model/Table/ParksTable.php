<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Parks Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Sectors
 * @property \Cake\ORM\Association\HasMany $Comments
 * @property \Cake\ORM\Association\HasMany $Fiefdoms
 * @property \Cake\ORM\Association\HasMany $Personas
 *
 * @method \App\Model\Entity\Park get($primaryKey, $options = [])
 * @method \App\Model\Entity\Park newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Park[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Park|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Park patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Park[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Park findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ParksTable extends Table
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

        $this->table('parks');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Sectors', [
            'foreignKey' => 'sector_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Comments', [
            'foreignKey' => 'park_id'
        ]);
        $this->hasMany('Fiefdoms', [
            'foreignKey' => 'park_id'
        ]);
        $this->hasMany('Personas', [
            'foreignKey' => 'park_id'
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
            ->requirePresence('rank', 'create')
            ->notEmpty('rank');

        $validator
            ->date('midreign')
            ->allowEmpty('midreign');

        $validator
            ->date('coronation')
            ->allowEmpty('coronation');

        $validator
            ->decimal('tax_rate')
            ->requirePresence('tax_rate', 'create')
            ->notEmpty('tax_rate');

        $validator
            ->requirePresence('tax_type', 'create')
            ->notEmpty('tax_type');

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
        $rules->add($rules->existsIn(['sector_id'], 'Sectors'));
        return $rules;
    }
}
