<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TerritoriesFixture
 *
 */
class TerritoriesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'name' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'sector_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'row' => ['type' => 'integer', 'length' => 2, 'unsigned' => true, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'column' => ['type' => 'integer', 'length' => 2, 'unsigned' => true, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'steward_persona_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => true, 'default' => null, 'comment' => 'If there\'s a Steward, this is the guy.', 'precision' => null, 'autoIncrement' => null],
        'steward_cut' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'terrain_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'primary_resource' => ['type' => 'string', 'length' => 11, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'secondary_resource' => ['type' => 'string', 'length' => 11, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'castle_strength' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'is_wasteland' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null],
        'is_no_mans_land' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null],
        'has_road' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_territory_steward_persona_id' => ['type' => 'index', 'columns' => ['steward_persona_id'], 'length' => []],
            'fk_territory_terrain_id' => ['type' => 'index', 'columns' => ['terrain_id'], 'length' => []],
            'fk_territory_sector_id' => ['type' => 'index', 'columns' => ['sector_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_territory_sector_id' => ['type' => 'foreign', 'columns' => ['sector_id'], 'references' => ['sectors', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'fk_territory_steward_persona_id' => ['type' => 'foreign', 'columns' => ['steward_persona_id'], 'references' => ['personas', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'fk_territory_terrain_id' => ['type' => 'foreign', 'columns' => ['terrain_id'], 'references' => ['terrains', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'name' => 1,
            'sector_id' => 1,
            'row' => 1,
            'column' => 1,
            'steward_persona_id' => 1,
            'steward_cut' => 1,
            'terrain_id' => 1,
            'primary_resource' => 'Lorem ips',
            'secondary_resource' => 'Lorem ips',
            'castle_strength' => 1,
            'is_wasteland' => 1,
            'is_no_mans_land' => 1,
            'has_road' => 1,
            'created' => '2016-07-06 03:46:57',
            'modified' => '2016-07-06 03:46:57'
        ],
    ];
}
