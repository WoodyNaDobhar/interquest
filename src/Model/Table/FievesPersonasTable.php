<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * FievesPersonas Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Fieves
 * @property \Cake\ORM\Association\BelongsTo $Personas
 *
 * @method \App\Model\Entity\FievesPersona get($primaryKey, $options = [])
 * @method \App\Model\Entity\FievesPersona newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\FievesPersona[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\FievesPersona|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FievesPersona patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\FievesPersona[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\FievesPersona findOrCreate($search, callable $callback = null)
 */
class FievesPersonasTable extends Table
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

        $this->table('fieves_personas');

        $this->belongsTo('Fieves', [
            'foreignKey' => 'fief_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Personas', [
            'foreignKey' => 'persona_id',
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
        $rules->add($rules->existsIn(['persona_id'], 'Personas'));
        return $rules;
    }
}
