<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PersonasTitles Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Personas
 * @property \Cake\ORM\Association\BelongsTo $Titles
 *
 * @method \App\Model\Entity\PersonasTitle get($primaryKey, $options = [])
 * @method \App\Model\Entity\PersonasTitle newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PersonasTitle[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PersonasTitle|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PersonasTitle patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PersonasTitle[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PersonasTitle findOrCreate($search, callable $callback = null)
 */
class PersonasTitlesTable extends Table
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

        $this->table('personas_titles');

        $this->belongsTo('Personas', [
            'foreignKey' => 'persona_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Titles', [
            'foreignKey' => 'title_id',
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
        $rules->add($rules->existsIn(['persona_id'], 'Personas'));
        $rules->add($rules->existsIn(['title_id'], 'Titles'));
        return $rules;
    }
}
