<?php
App::uses('Equipment', 'Model');

/**
 * Equipment Test Case
 *
 */
class EquipmentTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.equipment',
		'app.building',
		'app.territorybuilding',
		'app.npcequipment',
		'app.personaequipment'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Equipment = ClassRegistry::init('Equipment');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Equipment);

		parent::tearDown();
	}

}
