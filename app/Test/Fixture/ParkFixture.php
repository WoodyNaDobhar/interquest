<?php
/**
 * ParkFixture
 *
 */
class ParkFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'rank' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 25, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'sector_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'index'),
		'midreign' => array('type' => 'date', 'null' => true, 'default' => null),
		'coronation' => array('type' => 'date', 'null' => true, 'default' => null),
		'taxRate' => array('type' => 'decimal', 'null' => false, 'default' => '0.0000', 'length' => '6,4', 'unsigned' => false),
		'taxType' => array('type' => 'string', 'null' => false, 'default' => 'flat', 'length' => 10, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_park_sector_id' => array('column' => 'sector_id', 'unique' => 0)
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
			'rank' => 'Lorem ipsum dolor sit a',
			'sector_id' => 1,
			'midreign' => '2015-03-21',
			'coronation' => '2015-03-21',
			'taxRate' => '',
			'taxType' => 'Lorem ip',
			'created' => '2015-03-21 20:28:20',
			'modified' => '2015-03-21 20:28:20'
		),
	);

}
