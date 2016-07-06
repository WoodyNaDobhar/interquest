<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ActionsPersonasFixture
 *
 */
class ActionsPersonasFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'action_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => 'Should default to the Persona\'s default Action.', 'precision' => null, 'autoIncrement' => null],
        'persona_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_persona_action_id' => ['type' => 'index', 'columns' => ['action_id'], 'length' => []],
            'fk_action_persona_id' => ['type' => 'index', 'columns' => ['persona_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_action_persona_id' => ['type' => 'foreign', 'columns' => ['persona_id'], 'references' => ['personas', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'fk_persona_action_id' => ['type' => 'foreign', 'columns' => ['action_id'], 'references' => ['actions', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'action_id' => 1,
            'persona_id' => 1,
            'created' => '2016-07-06 03:42:45'
        ],
    ];
}
