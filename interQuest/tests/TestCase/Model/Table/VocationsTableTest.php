<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VocationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VocationsTable Test Case
 */
class VocationsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\VocationsTable
     */
    public $Vocations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.vocations',
        'app.npcs',
        'app.monsters',
        'app.personas',
        'app.users',
        'app.parks',
        'app.sectors',
        'app.comments',
        'app.territories',
        'app.terrains',
        'app.equipments_npcs',
        'app.equipments_personas',
        'app.fieves',
        'app.fiefdoms',
        'app.fieves_personas',
        'app.fieves_npcs',
        'app.buildings',
        'app.equipments',
        'app.buildings_territories',
        'app.actions',
        'app.actions_personas',
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
        $config = TableRegistry::exists('Vocations') ? [] : ['className' => 'App\Model\Table\VocationsTable'];
        $this->Vocations = TableRegistry::get('Vocations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Vocations);

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
