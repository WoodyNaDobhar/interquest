<?php
App::uses('Npcequipment', 'Model');

/**
 * Npcequipment Test Case
 *
 */
class NpcequipmentTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.npcequipment',
		'app.equipment',
		'app.building',
		'app.territorybuilding',
		'app.personaequipment',
		'app.npc',
		'app.territory'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Npcequipment = ClassRegistry::init('Npcequipment');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Npcequipment);

		parent::tearDown();
	}

}
