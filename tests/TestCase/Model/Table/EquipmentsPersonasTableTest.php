<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EquipmentsPersonasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EquipmentsPersonasTable Test Case
 */
class EquipmentsPersonasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EquipmentsPersonasTable
     */
    public $EquipmentsPersonas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.equipments_personas',
        'app.equipments',
        'app.buildings',
        'app.territories',
        'app.buildings_territories',
        'app.npcs',
        'app.equipments_npcs',
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
        $config = TableRegistry::exists('EquipmentsPersonas') ? [] : ['className' => 'App\Model\Table\EquipmentsPersonasTable'];
        $this->EquipmentsPersonas = TableRegistry::get('EquipmentsPersonas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->EquipmentsPersonas);

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
