<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TerrainsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TerrainsTable Test Case
 */
class TerrainsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TerrainsTable
     */
    public $Terrains;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.terrains',
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
        $config = TableRegistry::exists('Terrains') ? [] : ['className' => 'App\Model\Table\TerrainsTable'];
        $this->Terrains = TableRegistry::get('Terrains', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Terrains);

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
