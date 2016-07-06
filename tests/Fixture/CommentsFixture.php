<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CommentsFixture
 *
 */
class CommentsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'npc_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'park_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'persona_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'sector_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'territory_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'author_persona_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'subject' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'message' => ['type' => 'text', 'length' => 255, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'show_mapkeepers' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'deleted' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_comment_npc_id' => ['type' => 'index', 'columns' => ['npc_id'], 'length' => []],
            'fk_comment_park_id' => ['type' => 'index', 'columns' => ['park_id'], 'length' => []],
            'fk_comment_persona_id' => ['type' => 'index', 'columns' => ['persona_id'], 'length' => []],
            'fk_comment_sector_id' => ['type' => 'index', 'columns' => ['sector_id'], 'length' => []],
            'fk_comment_territory_id' => ['type' => 'index', 'columns' => ['territory_id'], 'length' => []],
            'fk_comment_author_persona_id' => ['type' => 'index', 'columns' => ['author_persona_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_comment_author_persona_id' => ['type' => 'foreign', 'columns' => ['author_persona_id'], 'references' => ['personas', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'fk_comment_npc_id' => ['type' => 'foreign', 'columns' => ['npc_id'], 'references' => ['npcs', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'fk_comment_park_id' => ['type' => 'foreign', 'columns' => ['park_id'], 'references' => ['parks', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'fk_comment_persona_id' => ['type' => 'foreign', 'columns' => ['persona_id'], 'references' => ['personas', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'fk_comment_sector_id' => ['type' => 'foreign', 'columns' => ['sector_id'], 'references' => ['sectors', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'fk_comment_territory_id' => ['type' => 'foreign', 'columns' => ['territory_id'], 'references' => ['territories', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'npc_id' => 1,
            'park_id' => 1,
            'persona_id' => 1,
            'sector_id' => 1,
            'territory_id' => 1,
            'author_persona_id' => 1,
            'subject' => 'Lorem ipsum dolor sit amet',
            'message' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'show_mapkeepers' => 1,
            'created' => '2016-07-06 03:43:48',
            'modified' => '2016-07-06 03:43:48',
            'deleted' => '2016-07-06 03:43:48'
        ],
    ];
}
