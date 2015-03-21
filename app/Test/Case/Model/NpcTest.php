<?php
App::uses('Npc', 'Model');

/**
 * Npc Test Case
 *
 */
class NpcTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.npc',
		'app.playclass',
		'app.monster',
		'app.persona',
		'app.territory',
		'app.action',
		'app.personaaction',
		'app.comment',
		'app.park',
		'app.sector',
		'app.author_persona',
		'app.fiefdom',
		'app.fief',
		'app.fiefs_persona',
		'app.fiefs_npc',
		'app.npcequipment',
		'app.equipment',
		'app.building',
		'app.territorybuilding',
		'app.personaequipment'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Npc = ClassRegistry::init('Npc');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Npc);

		parent::tearDown();
	}

}
