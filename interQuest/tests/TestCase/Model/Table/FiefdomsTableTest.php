<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FiefdomsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FiefdomsTable Test Case
 */
class FiefdomsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FiefdomsTable
     */
    public $Fiefdoms;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.fiefdoms',
        'app.personas',
        'app.npcs',
        'app.parks',
        'app.fieves'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Fiefdoms') ? [] : ['className' => 'App\Model\Table\FiefdomsTable'];
        $this->Fiefdoms = TableRegistry::get('Fiefdoms', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Fiefdoms);

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
