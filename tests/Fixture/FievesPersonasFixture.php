<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FievesPersonasFixture
 *
 */
class FievesPersonasFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'fief_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'persona_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_persona_fief' => ['type' => 'index', 'columns' => ['fief_id'], 'length' => []],
            'fk_fief_persona' => ['type' => 'index', 'columns' => ['persona_id'], 'length' => []],
        ],
        '_constraints' => [
            'fk_fief_persona' => ['type' => 'foreign', 'columns' => ['persona_id'], 'references' => ['personas', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'fk_persona_fief' => ['type' => 'foreign', 'columns' => ['fief_id'], 'references' => ['fieves', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'persona_id' => 1
        ],
    ];
}
