<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FievesFixture
 *
 */
class FievesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'name' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'territory_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'fiefdom_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'persona_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => true, 'default' => null, 'comment' => 'Owned by a Persona.  Is automatically public knowledge.', 'precision' => null, 'autoIncrement' => null],
        'npc_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'deleted' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_fief_territory_id' => ['type' => 'index', 'columns' => ['territory_id'], 'length' => []],
            'fk_fief_persona_id' => ['type' => 'index', 'columns' => ['persona_id'], 'length' => []],
            'fk_fief_npc_id' => ['type' => 'index', 'columns' => ['npc_id'], 'length' => []],
            'fk_fiefdom_id' => ['type' => 'index', 'columns' => ['fiefdom_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_fief_fiefdom_id' => ['type' => 'foreign', 'columns' => ['fiefdom_id'], 'references' => ['fiefdoms', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'fk_fief_npc_id' => ['type' => 'foreign', 'columns' => ['npc_id'], 'references' => ['npcs', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'fk_fief_persona_id' => ['type' => 'foreign', 'columns' => ['persona_id'], 'references' => ['personas', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'fk_fief_territory_id' => ['type' => 'foreign', 'columns' => ['territory_id'], 'references' => ['territories', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'name' => 'Lorem ipsum dolor sit amet',
            'territory_id' => 1,
            'fiefdom_id' => 1,
            'persona_id' => 1,
            'npc_id' => 1,
            'created' => '2016-09-30 00:42:48',
            'modified' => '2016-09-30 00:42:48',
            'deleted' => '2016-09-30 00:42:48'
        ],
    ];
}
