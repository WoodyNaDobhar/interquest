<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * FievesNpcs Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Fieves
 * @property \Cake\ORM\Association\BelongsTo $Npcs
 *
 * @method \App\Model\Entity\FievesNpc get($primaryKey, $options = [])
 * @method \App\Model\Entity\FievesNpc newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\FievesNpc[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\FievesNpc|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FievesNpc patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\FievesNpc[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\FievesNpc findOrCreate($search, callable $callback = null)
 */
class FievesNpcsTable extends Table
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

        $this->table('fieves_npcs');

        $this->belongsTo('Fieves', [
            'foreignKey' => 'fief_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Npcs', [
            'foreignKey' => 'npc_id',
            'joinType' => 'INNER'
        ]);
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
        $rules->add($rules->existsIn(['fief_id'], 'Fieves'));
        $rules->add($rules->existsIn(['npc_id'], 'Npcs'));
        return $rules;
    }
}
