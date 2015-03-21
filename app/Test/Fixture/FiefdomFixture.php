<?php
/**
 * FiefdomFixture
 *
 */
class FiefdomFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => '0', 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'persona_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'unsigned' => true, 'key' => 'index'),
		'npc_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'unsigned' => true, 'key' => 'index'),
		'park_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'unsigned' => true, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_fiefdom_owner_persona_id' => array('column' => 'persona_id', 'unique' => 0),
			'fk_fiefdom_owner_npc_id' => array('column' => 'npc_id', 'unique' => 0),
			'fk_fiefdom_park_id' => array('column' => 'park_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB', 'comment' => 'Clusters of fiefs or monster controlled territories.')
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
			'persona_id' => 1,
			'npc_id' => 1,
			'park_id' => 1
		),
	);

}
