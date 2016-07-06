<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BuildingsTerritoriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BuildingsTerritoriesTable Test Case
 */
class BuildingsTerritoriesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BuildingsTerritoriesTable
     */
    public $BuildingsTerritories;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.buildings_territories',
        'app.buildings',
        'app.equipments',
        'app.territories'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('BuildingsTerritories') ? [] : ['className' => 'App\Model\Table\BuildingsTerritoriesTable'];
        $this->BuildingsTerritories = TableRegistry::get('BuildingsTerritories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->BuildingsTerritories);

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
