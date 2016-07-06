<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ActionsPersonasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ActionsPersonasTable Test Case
 */
class ActionsPersonasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ActionsPersonasTable
     */
    public $ActionsPersonas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.actions_personas',
        'app.actions',
        'app.npcs',
        'app.personas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ActionsPersonas') ? [] : ['className' => 'App\Model\Table\ActionsPersonasTable'];
        $this->ActionsPersonas = TableRegistry::get('ActionsPersonas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ActionsPersonas);

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
