<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Territories Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Sectors
 * @property \Cake\ORM\Association\BelongsTo $Personas
 * @property \Cake\ORM\Association\BelongsTo $Terrains
 * @property \Cake\ORM\Association\HasMany $Comments
 * @property \Cake\ORM\Association\HasMany $EquipmentsNpcs
 * @property \Cake\ORM\Association\HasMany $EquipmentsPersonas
 * @property \Cake\ORM\Association\HasMany $Fieves
 * @property \Cake\ORM\Association\HasMany $Npcs
 * @property \Cake\ORM\Association\HasMany $Personas
 * @property \Cake\ORM\Association\BelongsToMany $Buildings
 *
 * @method \App\Model\Entity\Territory get($primaryKey, $options = [])
 * @method \App\Model\Entity\Territory newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Territory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Territory|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Territory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Territory[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Territory findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TerritoriesTable extends Table
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

        $this->table('territories');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Sectors', [
            'foreignKey' => 'sector_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Personas', [
            'foreignKey' => 'steward_persona_id'
        ]);
        $this->belongsTo('Terrains', [
            'foreignKey' => 'terrain_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Comments', [
            'foreignKey' => 'territory_id'
        ]);
        $this->hasMany('EquipmentsNpcs', [
            'foreignKey' => 'territory_id'
        ]);
        $this->hasMany('EquipmentsPersonas', [
            'foreignKey' => 'territory_id'
        ]);
        $this->hasMany('Fieves', [
            'foreignKey' => 'territory_id'
        ]);
        $this->hasMany('Npcs', [
            'foreignKey' => 'territory_id'
        ]);
        $this->hasMany('Personas', [
            'foreignKey' => 'territory_id'
        ]);
        $this->belongsToMany('Buildings', [
            'foreignKey' => 'territory_id',
            'targetForeignKey' => 'building_id',
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
            ->integer('name')
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->integer('row')
            ->requirePresence('row', 'create')
            ->notEmpty('row');

        $validator
            ->integer('column')
            ->requirePresence('column', 'create')
            ->notEmpty('column');

        $validator
            ->integer('steward_cut')
            ->allowEmpty('steward_cut');

        $validator
            ->requirePresence('primary_resource', 'create')
            ->notEmpty('primary_resource');

        $validator
            ->allowEmpty('secondary_resource');

        $validator
            ->integer('castle_strength')
            ->requirePresence('castle_strength', 'create')
            ->notEmpty('castle_strength');

        $validator
            ->boolean('is_wasteland')
            ->requirePresence('is_wasteland', 'create')
            ->notEmpty('is_wasteland');

        $validator
            ->boolean('is_no_mans_land')
            ->requirePresence('is_no_mans_land', 'create')
            ->notEmpty('is_no_mans_land');

        $validator
            ->boolean('has_road')
            ->requirePresence('has_road', 'create')
            ->notEmpty('has_road');

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
        $rules->add($rules->existsIn(['steward_persona_id'], 'Personas'));
        $rules->add($rules->existsIn(['terrain_id'], 'Terrains'));
        return $rules;
    }
}
