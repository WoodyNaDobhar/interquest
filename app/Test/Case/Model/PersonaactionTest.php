<?php
App::uses('Personaaction', 'Model');

/**
 * Personaaction Test Case
 *
 */
class PersonaactionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.personaaction',
		'app.action',
		'app.npc',
		'app.playclass',
		'app.monster',
		'app.persona',
		'app.territory',
		'app.comment',
		'app.park',
		'app.sector',
		'app.fiefdom',
		'app.author_persona',
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
		$this->Personaaction = ClassRegistry::init('Personaaction');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Personaaction);

		parent::tearDown();
	}

}
