<?php
/**
 * NpcequipmentFixture
 *
 */
class NpcequipmentFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'comment' => 'If the piece of equipment has a name.', 'charset' => 'latin1'),
		'equipment_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'index'),
		'npc_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'index'),
		'territory_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'index', 'comment' => 'If it isn\'t on the NPC, where it resides.'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_persona_equipment_id' => array('column' => 'npc_id', 'unique' => 0),
			'fk_equipment_persona_id' => array('column' => 'equipment_id', 'unique' => 0),
			'fk_npc_equipment_location_territory_id' => array('column' => 'territory_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'equipment_id' => 1,
			'npc_id' => 1,
			'territory_id' => 1,
			'created' => '2015-03-21 20:26:22',
			'modified' => '2015-03-21 20:26:22'
		),
	);

}
