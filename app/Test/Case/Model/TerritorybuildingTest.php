<?php
App::uses('Territorybuilding', 'Model');

/**
 * Territorybuilding Test Case
 *
 */
class TerritorybuildingTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.territorybuilding',
		'app.building',
		'app.equipment',
		'app.npcequipment',
		'app.npc',
		'app.playclass',
		'app.persona',
		'app.user',
		'app.monster',
		'app.park',
		'app.sector',
		'app.comment',
		'app.territory',
		'app.terrain',
		'app.fief',
		'app.fiefs_persona',
		'app.fiefs_npc',
		'app.personaequipment',
		'app.author_persona',
		'app.fiefdom',
		'app.action',
		'app.personaaction',
		'app.title',
		'app.personas_title'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Territorybuilding = ClassRegistry::init('Territorybuilding');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Territorybuilding);

		parent::tearDown();
	}

}
