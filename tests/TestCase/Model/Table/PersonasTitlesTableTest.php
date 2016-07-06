<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PersonasTitlesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PersonasTitlesTable Test Case
 */
class PersonasTitlesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PersonasTitlesTable
     */
    public $PersonasTitles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.personas_titles',
        'app.personas',
        'app.orks',
        'app.users',
        'app.vocations',
        'app.monsters',
        'app.npcs',
        'app.territories',
        'app.actions',
        'app.actions_personas',
        'app.comments',
        'app.parks',
        'app.sectors',
        'app.fiefdoms',
        'app.fieves',
        'app.fieves_personas',
        'app.fieves_npcs',
        'app.equipments',
        'app.buildings',
        'app.buildings_territories',
        'app.equipments_npcs',
        'app.equipments_personas',
        'app.titles'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PersonasTitles') ? [] : ['className' => 'App\Model\Table\PersonasTitlesTable'];
        $this->PersonasTitles = TableRegistry::get('PersonasTitles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PersonasTitles);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
