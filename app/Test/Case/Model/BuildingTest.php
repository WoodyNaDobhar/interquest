<?php
App::uses('Building', 'Model');

/**
 * Building Test Case
 *
 */
class BuildingTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.building',
		'app.equipment',
		'app.territorybuilding'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Building = ClassRegistry::init('Building');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Building);

		parent::tearDown();
	}

}
