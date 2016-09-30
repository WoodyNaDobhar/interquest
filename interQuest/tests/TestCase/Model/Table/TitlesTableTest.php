<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TitlesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TitlesTable Test Case
 */
class TitlesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TitlesTable
     */
    public $Titles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.titles',
        'app.personas',
        'app.users',
        'app.vocations',
        'app.monsters',
        'app.npcs',
        'app.territories',
        'app.sectors',
        'app.comments',
        'app.parks',
        'app.fiefdoms',
        'app.fieves',
        'app.fieves_personas',
        'app.fieves_npcs',
        'app.terrains',
        'app.equipments_npcs',
        'app.equipments_personas',
        'app.buildings',
        'app.equipments',
        'app.buildings_territories',
        'app.actions',
        'app.actions_personas',
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
        $config = TableRegistry::exists('Titles') ? [] : ['className' => 'App\Model\Table\TitlesTable'];
        $this->Titles = TableRegistry::get('Titles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Titles);

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
