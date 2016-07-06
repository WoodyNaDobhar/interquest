<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FievesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FievesTable Test Case
 */
class FievesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FievesTable
     */
    public $Fieves;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.fieves',
        'app.territories',
        'app.fiefdoms',
        'app.personas',
        'app.npcs',
        'app.parks',
        'app.fieves_personas',
        'app.fieves_npcs'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Fieves') ? [] : ['className' => 'App\Model\Table\FievesTable'];
        $this->Fieves = TableRegistry::get('Fieves', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Fieves);

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
