<?php
/**
 * NpcFixture
 *
 */
class NpcFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'privateName' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'image' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'playclass_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'index'),
		'monster_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'index'),
		'backgroundPublic' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'backgroundPrivate' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'territory_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'index', 'comment' => 'The NPC\'s home Territory.'),
		'gold' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 4, 'unsigned' => true),
		'iron' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 4, 'unsigned' => true),
		'timber' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 4, 'unsigned' => true),
		'stone' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 4, 'unsigned' => true),
		'grain' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 4, 'unsigned' => true),
		'action_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 4, 'unsigned' => true, 'key' => 'index', 'comment' => 'The NPC\'s default Action.'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'deceased' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_npc_monster_id' => array('column' => 'monster_id', 'unique' => 0),
			'fk_npc_home_territory_id' => array('column' => 'territory_id', 'unique' => 0),
			'fk_npc_default_action_id' => array('column' => 'action_id', 'unique' => 0),
			'fk_npc_playclass_id' => array('column' => 'playclass_id', 'unique' => 0)
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
			'privateName' => 'Lorem ipsum dolor sit amet',
			'image' => 'Lorem ipsum dolor sit amet',
			'playclass_id' => 1,
			'monster_id' => 1,
			'backgroundPublic' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'backgroundPrivate' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'territory_id' => 1,
			'gold' => 1,
			'iron' => 1,
			'timber' => 1,
			'stone' => 1,
			'grain' => 1,
			'action_id' => 1,
			'created' => '2015-03-21 20:27:21',
			'modified' => '2015-03-21 20:27:21',
			'deceased' => '2015-03-21 20:27:21'
		),
	);

}
