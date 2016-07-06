<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SectorsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SectorsTable Test Case
 */
class SectorsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SectorsTable
     */
    public $Sectors;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.sectors',
        'app.comments',
        'app.npcs',
        'app.vocations',
        'app.monsters',
        'app.personas',
        'app.orks',
        'app.users',
        'app.parks',
        'app.fiefdoms',
        'app.fieves',
        'app.territories',
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
        'app.personas_titles'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Sectors') ? [] : ['className' => 'App\Model\Table\SectorsTable'];
        $this->Sectors = TableRegistry::get('Sectors', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Sectors);

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
}
