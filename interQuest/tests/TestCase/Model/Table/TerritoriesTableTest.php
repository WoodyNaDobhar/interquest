<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TerritoriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TerritoriesTable Test Case
 */
class TerritoriesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TerritoriesTable
     */
    public $Territories;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.territories',
        'app.sectors',
        'app.comments',
        'app.npcs',
        'app.vocations',
        'app.monsters',
        'app.personas',
        'app.users',
        'app.parks',
        'app.fiefdoms',
        'app.fieves',
        'app.fieves_personas',
        'app.fieves_npcs',
        'app.actions',
        'app.actions_personas',
        'app.equipments',
        'app.buildings',
        'app.buildings_territories',
        'app.equipments_npcs',
        'app.equipments_personas',
        'app.titles',
        'app.personas_titles',
        'app.terrains'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Territories') ? [] : ['className' => 'App\Model\Table\TerritoriesTable'];
        $this->Territories = TableRegistry::get('Territories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Territories);

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
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
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
