<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * NpcsFixture
 *
 */
class NpcsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'name' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'private_name' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'image' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'vocation_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'monster_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'background_public' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'background_private' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'territory_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => 'The NPC\'s home Territory.', 'precision' => null, 'autoIncrement' => null],
        'gold' => ['type' => 'integer', 'length' => 4, 'unsigned' => true, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'iron' => ['type' => 'integer', 'length' => 4, 'unsigned' => true, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'timber' => ['type' => 'integer', 'length' => 4, 'unsigned' => true, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'stone' => ['type' => 'integer', 'length' => 4, 'unsigned' => true, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'grain' => ['type' => 'integer', 'length' => 4, 'unsigned' => true, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'action_id' => ['type' => 'integer', 'length' => 4, 'unsigned' => true, 'null' => true, 'default' => null, 'comment' => 'The NPC\'s default Action.', 'precision' => null, 'autoIncrement' => null],
        'deceased' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'deleted' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_npc_monster_id' => ['type' => 'index', 'columns' => ['monster_id'], 'length' => []],
            'fk_npc_home_territory_id' => ['type' => 'index', 'columns' => ['territory_id'], 'length' => []],
            'fk_npc_default_action_id' => ['type' => 'index', 'columns' => ['action_id'], 'length' => []],
            'fk_npc_vocation_id' => ['type' => 'index', 'columns' => ['vocation_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_npc_default_action_id' => ['type' => 'foreign', 'columns' => ['action_id'], 'references' => ['actions', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'fk_npc_home_territory_id' => ['type' => 'foreign', 'columns' => ['territory_id'], 'references' => ['territories', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'fk_npc_monster_id' => ['type' => 'foreign', 'columns' => ['monster_id'], 'references' => ['monsters', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'fk_npc_vocation_id' => ['type' => 'foreign', 'columns' => ['vocation_id'], 'references' => ['vocations', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'private_name' => 'Lorem ipsum dolor sit amet',
            'image' => 'Lorem ipsum dolor sit amet',
            'vocation_id' => 1,
            'monster_id' => 1,
            'background_public' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'background_private' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'territory_id' => 1,
            'gold' => 1,
            'iron' => 1,
            'timber' => 1,
            'stone' => 1,
            'grain' => 1,
            'action_id' => 1,
            'deceased' => '2016-07-06 03:45:39',
            'created' => '2016-07-06 03:45:39',
            'modified' => '2016-07-06 03:45:39',
            'deleted' => '2016-07-06 03:45:39'
        ],
    ];
}
