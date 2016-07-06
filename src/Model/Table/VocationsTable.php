<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Vocations Model
 *
 * @property \Cake\ORM\Association\HasMany $Npcs
 * @property \Cake\ORM\Association\HasMany $Personas
 *
 * @method \App\Model\Entity\Vocation get($primaryKey, $options = [])
 * @method \App\Model\Entity\Vocation newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Vocation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Vocation|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Vocation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Vocation[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Vocation findOrCreate($search, callable $callback = null)
 */
class VocationsTable extends Table
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

        $this->table('vocations');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->hasMany('Npcs', [
            'foreignKey' => 'vocation_id'
        ]);
        $this->hasMany('Personas', [
            'foreignKey' => 'vocation_id'
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
            ->requirePresence('ability', 'create')
            ->notEmpty('ability');

        $validator
            ->requirePresence('ability_description', 'create')
            ->notEmpty('ability_description');

        return $validator;
    }
}
