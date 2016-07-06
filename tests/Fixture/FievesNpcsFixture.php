<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FievesNpcsFixture
 *
 */
class FievesNpcsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'fief_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'npc_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_npc_fief_id' => ['type' => 'index', 'columns' => ['fief_id'], 'length' => []],
            'fk_fief_npc_id' => ['type' => 'index', 'columns' => ['npc_id'], 'length' => []],
        ],
        '_constraints' => [
            'fk_npc_fief' => ['type' => 'foreign', 'columns' => ['fief_id'], 'references' => ['fieves', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'fk_fief_npc' => ['type' => 'foreign', 'columns' => ['npc_id'], 'references' => ['npcs', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'fief_id' => 1,
            'npc_id' => 1
        ],
    ];
}
