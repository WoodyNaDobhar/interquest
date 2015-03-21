<?php
App::uses('Personaequipment', 'Model');

/**
 * Personaequipment Test Case
 *
 */
class PersonaequipmentTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.personaequipment',
		'app.equipment',
		'app.building',
		'app.territorybuilding',
		'app.npcequipment',
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
		'app.fiefdom',
		'app.author_persona',
		'app.fief',
		'app.fiefs_persona',
		'app.fiefs_npc'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Personaequipment = ClassRegistry::init('Personaequipment');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Personaequipment);

		parent::tearDown();
	}

}
