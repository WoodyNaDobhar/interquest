<?php
App::uses('Sector', 'Model');

/**
 * Sector Test Case
 *
 */
class SectorTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.sector',
		'app.comment',
		'app.npc',
		'app.playclass',
		'app.persona',
		'app.user',
		'app.monster',
		'app.park',
		'app.fiefdom',
		'app.territory',
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
		'app.author_persona'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Sector = ClassRegistry::init('Sector');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Sector);

		parent::tearDown();
	}

}
