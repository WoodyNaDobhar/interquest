<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FievesPersonasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FievesPersonasTable Test Case
 */
class FievesPersonasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FievesPersonasTable
     */
    public $FievesPersonas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.fieves_personas',
        'app.fieves',
        'app.territories',
        'app.fiefdoms',
        'app.personas',
        'app.npcs',
        'app.parks',
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
        $config = TableRegistry::exists('FievesPersonas') ? [] : ['className' => 'App\Model\Table\FievesPersonasTable'];
        $this->FievesPersonas = TableRegistry::get('FievesPersonas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->FievesPersonas);

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
