<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NpcsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NpcsTable Test Case
 */
class NpcsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\NpcsTable
     */
    public $Npcs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.npcs',
        'app.vocations',
        'app.monsters',
        'app.personas',
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
        'app.equipments_personas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Npcs') ? [] : ['className' => 'App\Model\Table\NpcsTable'];
        $this->Npcs = TableRegistry::get('Npcs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Npcs);

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
