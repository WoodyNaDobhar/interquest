<?php
App::uses('Park', 'Model');

/**
 * Park Test Case
 *
 */
class ParkTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.park',
		'app.sector',
		'app.comment',
		'app.npc',
		'app.playclass',
		'app.monster',
		'app.persona',
		'app.territory',
		'app.action',
		'app.personaaction',
		'app.fiefdom',
		'app.fief',
		'app.fiefs_persona',
		'app.fiefs_npc',
		'app.npcequipment',
		'app.equipment',
		'app.building',
		'app.territorybuilding',
		'app.personaequipment',
		'app.author_persona'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Park = ClassRegistry::init('Park');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Park);

		parent::tearDown();
	}

}
