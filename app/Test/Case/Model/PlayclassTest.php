<?php
App::uses('Playclass', 'Model');

/**
 * Playclass Test Case
 *
 */
class PlayclassTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.playclass',
		'app.npc',
		'app.monster',
		'app.persona',
		'app.user',
		'app.park',
		'app.sector',
		'app.comment',
		'app.territory',
		'app.author_persona',
		'app.fiefdom',
		'app.action',
		'app.personaaction',
		'app.fief',
		'app.fiefs_persona',
		'app.fiefs_npc',
		'app.personaequipment',
		'app.equipment',
		'app.building',
		'app.territorybuilding',
		'app.npcequipment',
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
		$this->Playclass = ClassRegistry::init('Playclass');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Playclass);

		parent::tearDown();
	}

}
