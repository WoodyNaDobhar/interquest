<?php
/**
 * BuildingFixture
 *
 */
class BuildingFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'description' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'costGold' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 2, 'unsigned' => true),
		'costIron' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 2, 'unsigned' => true),
		'costTimber' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 2, 'unsigned' => true),
		'costStone' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 2, 'unsigned' => true),
		'costGrain' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 2, 'unsigned' => true),
		'costActions' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 2, 'unsigned' => true),
		'maxSize' => array('type' => 'integer', 'null' => true, 'default' => '1', 'length' => 2, 'unsigned' => true),
		'maxBuilds' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 2, 'unsigned' => true),
		'requiresCastle' => array('type' => 'boolean', 'null' => true, 'default' => '1'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
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
			'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'costGold' => 1,
			'costIron' => 1,
			'costTimber' => 1,
			'costStone' => 1,
			'costGrain' => 1,
			'costActions' => 1,
			'maxSize' => 1,
			'maxBuilds' => 1,
			'requiresCastle' => 1
		),
	);

}
