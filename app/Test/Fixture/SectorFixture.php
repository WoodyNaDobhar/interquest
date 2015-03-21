<?php
/**
 * SectorFixture
 *
 */
class SectorFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'row' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 2, 'unsigned' => true),
		'column' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 2, 'unsigned' => true),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB', 'comment' => 'The \'world\' will currently be 300 by 180.  Geographic center is 39.8282° lat, -98.5795° long, which represents 0-0, from 0-0.  Columbus is 39.9833°, -82.9833°.  To find out what row a park is in, subtract the center lat from the target lat.  Multiply that number by 69 (the number of miles in a degree lat), and divide that by 10.  Floor that.  That\'s what row they\'re in.  The column is a bit weird...the actual earth is round.  We\'re going to normalize that curve by setting a standard width of 60 miles, which is about what the width is at 29.9228° N, 98° W (which just HAPPENS to be San Marcos).  So, subtract the center long from the target long.  Multiply that number by 60, and divide that by 10.  Floor that.  That\'s the column.')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'row' => 1,
			'column' => 1,
			'created' => '2015-03-21 20:32:35',
			'modified' => '2015-03-21 20:32:35'
		),
	);

}
