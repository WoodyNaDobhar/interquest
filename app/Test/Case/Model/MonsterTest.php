<?php
App::uses('Monster', 'Model');

/**
 * Monster Test Case
 *
 */
class MonsterTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.monster',
		'app.npc',
		'app.persona'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Monster = ClassRegistry::init('Monster');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Monster);

		parent::tearDown();
	}

}
