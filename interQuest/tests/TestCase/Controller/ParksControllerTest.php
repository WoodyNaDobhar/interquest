<?php
namespace App\Test\TestCase\Controller;

use App\Controller\ParksController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\ParksController Test Case
 */
class ParksControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.parks',
        'app.sectors',
        'app.comments',
        'app.npcs',
        'app.vocations',
        'app.monsters',
        'app.personas',
        'app.actions_personas',
        'app.actions',
        'app.fieves_personas',
        'app.fieves',
        'app.territories',
        'app.buildings_territories',
        'app.buildings',
        'app.equipments',
        'app.equipments_npcs',
        'app.equipments_personas',
        'app.fiefdoms',
        'app.fieves_npcs'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
