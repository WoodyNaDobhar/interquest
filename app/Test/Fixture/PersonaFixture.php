<?php
/**
 * PersonaFixture
 *
 */
class PersonaFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'orkId' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => true),
		'user_id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 35, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'longName' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'image' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'playclass_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'index'),
		'monster_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'index'),
		'npc_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => true, 'comment' => 'Influential Commoners are essentially NPC\'s.'),
		'backgroundPublic' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'backgroundPrivate' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'park_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'index'),
		'territory_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'index', 'comment' => 'Home territory.'),
		'gold' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 4, 'unsigned' => true),
		'iron' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 4, 'unsigned' => true),
		'timber' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 4, 'unsigned' => true),
		'stone' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 4, 'unsigned' => true),
		'grain' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 4, 'unsigned' => true),
		'action_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'index', 'comment' => 'Default action.'),
		'isKnight' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'isRebel' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'isMonarch' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'fiefsAssigned' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 2, 'unsigned' => true),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'shattered' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'deceased' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_persona_monster_id' => array('column' => 'monster_id', 'unique' => 0),
			'fk_persona_park_id' => array('column' => 'park_id', 'unique' => 0),
			'fk_persona_playclass_id' => array('column' => 'playclass_id', 'unique' => 0),
			'fk_persona_default_action_id' => array('column' => 'action_id', 'unique' => 0),
			'fk_persona_home_territory_id' => array('column' => 'territory_id', 'unique' => 0)
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
			'orkId' => 1,
			'user_id' => 'Lorem ipsum dolor sit amet',
			'name' => 'Lorem ipsum dolor sit amet',
			'longName' => 'Lorem ipsum dolor sit amet',
			'image' => 'Lorem ipsum dolor sit amet',
			'playclass_id' => 1,
			'monster_id' => 1,
			'npc_id' => 1,
			'backgroundPublic' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'backgroundPrivate' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'park_id' => 1,
			'territory_id' => 1,
			'gold' => 1,
			'iron' => 1,
			'timber' => 1,
			'stone' => 1,
			'grain' => 1,
			'action_id' => 1,
			'isKnight' => 1,
			'isRebel' => 1,
			'isMonarch' => 1,
			'fiefsAssigned' => 1,
			'created' => '2015-03-21 20:30:26',
			'modified' => '2015-03-21 20:30:26',
			'shattered' => '2015-03-21 20:30:26',
			'deceased' => '2015-03-21 20:30:26'
		),
	);

}
