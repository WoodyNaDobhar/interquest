<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EquipmentsNpcsFixture
 *
 */
class EquipmentsNpcsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'name' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'comment' => 'If the piece of equipment has a name.', 'precision' => null, 'fixed' => null],
        'equipment_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'npc_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'territory_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => true, 'default' => null, 'comment' => 'If it isn\'t on the NPC, where it resides.', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'deleted' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_persona_equipment_id' => ['type' => 'index', 'columns' => ['npc_id'], 'length' => []],
            'fk_equipment_persona_id' => ['type' => 'index', 'columns' => ['equipment_id'], 'length' => []],
            'fk_npc_equipment_location_territory_id' => ['type' => 'index', 'columns' => ['territory_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_equipment_npc_id' => ['type' => 'foreign', 'columns' => ['equipment_id'], 'references' => ['equipments', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'fk_npc_equipment_id' => ['type' => 'foreign', 'columns' => ['npc_id'], 'references' => ['npcs', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'fk_npc_equipment_location_territory_id' => ['type' => 'foreign', 'columns' => ['territory_id'], 'references' => ['territories', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'equipment_id' => 1,
            'npc_id' => 1,
            'territory_id' => 1,
            'created' => '2016-07-06 03:44:10',
            'modified' => '2016-07-06 03:44:10',
            'deleted' => '2016-07-06 03:44:10'
        ],
    ];
}
