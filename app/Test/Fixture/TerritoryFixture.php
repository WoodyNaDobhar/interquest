<?php
/**
 * TerritoryFixture
 *
 */
class TerritoryFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'name' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true),
		'sector_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true),
		'row' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 2, 'unsigned' => true),
		'column' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 2, 'unsigned' => true),
		'persona_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'index', 'comment' => 'If there\'s a Steward, this is the guy.'),
		'steward_cut' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => true),
		'terrain_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'index'),
		'resource1' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 11, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'resource2' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 11, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'castleStrength' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'unsigned' => true),
		'isWasteland' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'isNoMansLand' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'hasRoad' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_territory_steward_persona_id' => array('column' => 'persona_id', 'unique' => 0),
			'fk_territory_terrain_id' => array('column' => 'terrain_id', 'unique' => 0)
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
			'name' => 1,
			'sector_id' => 1,
			'row' => 1,
			'column' => 1,
			'persona_id' => 1,
			'steward_cut' => 1,
			'terrain_id' => 1,
			'resource1' => 'Lorem ips',
			'resource2' => 'Lorem ips',
			'castleStrength' => 1,
			'isWasteland' => 1,
			'isNoMansLand' => 1,
			'hasRoad' => 1,
			'created' => '2015-03-21 20:33:51',
			'modified' => '2015-03-21 20:33:51'
		),
	);

}
