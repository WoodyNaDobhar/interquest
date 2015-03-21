<?php
App::uses('Persona', 'Model');

/**
 * Persona Test Case
 *
 */
class PersonaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.persona',
		'app.user',
		'app.playclass',
		'app.monster',
		'app.npc',
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
		'app.fiefs_npc',
		'app.npcequipment',
		'app.equipment',
		'app.building',
		'app.territorybuilding',
		'app.personaequipment',
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
		$this->Persona = ClassRegistry::init('Persona');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Persona);

		parent::tearDown();
	}

}
