<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PersonasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PersonasTable Test Case
 */
class PersonasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PersonasTable
     */
    public $Personas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        $config = TableRegistry::exists('Personas') ? [] : ['className' => 'App\Model\Table\PersonasTable'];
        $this->Personas = TableRegistry::get('Personas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Personas);

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
