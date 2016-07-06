<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PersonasTitlesFixture
 *
 */
class PersonasTitlesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'persona_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'title_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_title_persona_id' => ['type' => 'index', 'columns' => ['persona_id'], 'length' => []],
            'fk_persona_title_id' => ['type' => 'index', 'columns' => ['title_id'], 'length' => []],
        ],
        '_constraints' => [
            'fk_persona_title_id' => ['type' => 'foreign', 'columns' => ['title_id'], 'references' => ['titles', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'fk_title_persona_id' => ['type' => 'foreign', 'columns' => ['persona_id'], 'references' => ['personas', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'persona_id' => 1,
            'title_id' => 1
        ],
    ];
}
