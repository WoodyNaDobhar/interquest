<?php
App::uses('Territory', 'Model');

/**
 * Territory Test Case
 *
 */
class TerritoryTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.territory',
		'app.sector',
		'app.comment',
		'app.npc',
		'app.playclass',
		'app.persona',
		'app.user',
		'app.monster',
		'app.park',
		'app.fiefdom',
		'app.action',
		'app.personaaction',
		'app.fief',
		'app.fiefs_persona',
		'app.fiefs_npc',
		'app.personaequipment',
		'app.equipment',
		'app.building',
		'app.territorybuilding',
		'app.npcequipment',
		'app.title',
		'app.personas_title',
		'app.author_persona',
		'app.terrain'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Territory = ClassRegistry::init('Territory');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Territory);

		parent::tearDown();
	}

}
