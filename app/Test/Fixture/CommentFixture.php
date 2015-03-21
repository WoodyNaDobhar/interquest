<?php
/**
 * CommentFixture
 *
 */
class CommentFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'npc_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'unsigned' => true, 'key' => 'index'),
		'park_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'unsigned' => true, 'key' => 'index'),
		'persona_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'unsigned' => true, 'key' => 'index'),
		'sector_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'unsigned' => true, 'key' => 'index'),
		'territory_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'unsigned' => true, 'key' => 'index'),
		'author_persona_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'index'),
		'subject' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'message' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'showMKs' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_comment_npc_id' => array('column' => 'npc_id', 'unique' => 0),
			'fk_comment_park_id' => array('column' => 'park_id', 'unique' => 0),
			'fk_comment_persona_id' => array('column' => 'persona_id', 'unique' => 0),
			'fk_comment_sector_id' => array('column' => 'sector_id', 'unique' => 0),
			'fk_comment_territory_id' => array('column' => 'territory_id', 'unique' => 0),
			'fk_comment_author_persona_id' => array('column' => 'author_persona_id', 'unique' => 0)
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
			'npc_id' => 1,
			'park_id' => 1,
			'persona_id' => 1,
			'sector_id' => 1,
			'territory_id' => 1,
			'author_persona_id' => 1,
			'subject' => 'Lorem ipsum dolor sit amet',
			'message' => 'Lorem ipsum dolor sit amet',
			'showMKs' => 1,
			'created' => '2015-03-21 20:22:04',
			'modified' => '2015-03-21 20:22:04'
		),
	);

}
