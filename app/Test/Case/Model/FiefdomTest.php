<?php
App::uses('Fiefdom', 'Model');

/**
 * Fiefdom Test Case
 *
 */
class FiefdomTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.fiefdom',
		'app.persona',
		'app.npc',
		'app.park'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Fiefdom = ClassRegistry::init('Fiefdom');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Fiefdom);

		parent::tearDown();
	}

}
