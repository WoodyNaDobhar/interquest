<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Actions Model
 *
 * @property \Cake\ORM\Association\HasMany $Npcs
 * @property \Cake\ORM\Association\HasMany $Personas
 * @property \Cake\ORM\Association\BelongsToMany $Personas
 *
 * @method \App\Model\Entity\Action get($primaryKey, $options = [])
 * @method \App\Model\Entity\Action newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Action[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Action|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Action patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Action[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Action findOrCreate($search, callable $callback = null)
 */
class ActionsTable extends Table
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

        $this->table('actions');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->hasMany('Npcs', [
            'foreignKey' => 'action_id'
        ]);
        $this->hasMany('Personas', [
            'foreignKey' => 'action_id'
        ]);
        $this->belongsToMany('Personas', [
            'foreignKey' => 'action_id',
            'targetForeignKey' => 'persona_id',
            'joinTable' => 'actions_personas'
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
            ->boolean('is_common')
            ->requirePresence('is_common', 'create')
            ->notEmpty('is_common');

        $validator
            ->boolean('is_landed')
            ->requirePresence('is_landed', 'create')
            ->notEmpty('is_landed');

        $validator
            ->boolean('check_required')
            ->requirePresence('check_required', 'create')
            ->notEmpty('check_required');

        return $validator;
    }
}
