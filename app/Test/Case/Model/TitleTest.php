<?php
App::uses('Title', 'Model');

/**
 * Title Test Case
 *
 */
class TitleTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.title',
		'app.persona',
		'app.user',
		'app.playclass',
		'app.npc',
		'app.monster',
		'app.territory',
		'app.sector',
		'app.comment',
		'app.park',
		'app.fiefdom',
		'app.author_persona',
		'app.terrain',
		'app.fief',
		'app.fiefs_persona',
		'app.fiefs_npc',
		'app.npcequipment',
		'app.equipment',
		'app.building',
		'app.territorybuilding',
		'app.personaequipment',
		'app.action',
		'app.personaaction',
		'app.personas_title'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Title = ClassRegistry::init('Title');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Title);

		parent::tearDown();
	}

}
