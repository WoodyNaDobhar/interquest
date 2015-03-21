<?php
/**
 * EquipmentFixture
 *
 */
class EquipmentFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'equipments';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'price' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 4, 'unsigned' => true),
		'units' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 2, 'unsigned' => true, 'comment' => 'Number of units the cost/craft provides.'),
		'description' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'weight' => array('type' => 'decimal', 'null' => false, 'default' => null, 'length' => '10,2', 'unsigned' => false),
		'cargo' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 2, 'unsigned' => true, 'comment' => 'How many Personae & Gear or Resources the transport has.  Null if it\'s not a transport.'),
		'craft_gold' => array('type' => 'decimal', 'null' => true, 'default' => null, 'length' => '10,2', 'unsigned' => false),
		'craft_iron' => array('type' => 'decimal', 'null' => true, 'default' => null, 'length' => '10,2', 'unsigned' => false),
		'craft_timber' => array('type' => 'decimal', 'null' => true, 'default' => null, 'length' => '10,2', 'unsigned' => false),
		'craft_stone' => array('type' => 'decimal', 'null' => true, 'default' => null, 'length' => '10,2', 'unsigned' => false),
		'craft_grain' => array('type' => 'decimal', 'null' => true, 'default' => null, 'length' => '10,2', 'unsigned' => false),
		'craft_actions' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 4, 'unsigned' => true),
		'building_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'index', 'comment' => 'Building required to craft the item.'),
		'isArtifact' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'isRelic' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_craft_building_id' => array('column' => 'building_id', 'unique' => 0)
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
			'price' => 1,
			'units' => 1,
			'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'weight' => '',
			'cargo' => 1,
			'craft_gold' => '',
			'craft_iron' => '',
			'craft_timber' => '',
			'craft_stone' => '',
			'craft_grain' => '',
			'craft_actions' => 1,
			'building_id' => 1,
			'isArtifact' => 1,
			'isRelic' => 1,
			'created' => '2015-03-21 20:23:52',
			'modified' => '2015-03-21 20:23:52'
		),
	);

}
