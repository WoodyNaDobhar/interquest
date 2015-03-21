<?php
App::uses('Terrain', 'Model');

/**
 * Terrain Test Case
 *
 */
class TerrainTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.terrain',
		'app.territory'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Terrain = ClassRegistry::init('Terrain');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Terrain);

		parent::tearDown();
	}

}
