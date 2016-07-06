<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EquipmentsNpcsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EquipmentsNpcsTable Test Case
 */
class EquipmentsNpcsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EquipmentsNpcsTable
     */
    public $EquipmentsNpcs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.equipments_npcs',
        'app.equipments',
        'app.buildings',
        'app.territories',
        'app.buildings_territories',
        'app.npcs',
        'app.personas',
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
        $config = TableRegistry::exists('EquipmentsNpcs') ? [] : ['className' => 'App\Model\Table\EquipmentsNpcsTable'];
        $this->EquipmentsNpcs = TableRegistry::get('EquipmentsNpcs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->EquipmentsNpcs);

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
