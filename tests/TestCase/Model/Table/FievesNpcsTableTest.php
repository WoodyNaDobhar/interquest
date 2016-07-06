<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FievesNpcsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FievesNpcsTable Test Case
 */
class FievesNpcsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FievesNpcsTable
     */
    public $FievesNpcs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.fieves_npcs',
        'app.fieves',
        'app.territories',
        'app.fiefdoms',
        'app.personas',
        'app.npcs',
        'app.parks',
        'app.fieves_personas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('FievesNpcs') ? [] : ['className' => 'App\Model\Table\FievesNpcsTable'];
        $this->FievesNpcs = TableRegistry::get('FievesNpcs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->FievesNpcs);

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
