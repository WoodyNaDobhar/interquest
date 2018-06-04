<?php

use App\Models\ActionPersona;
use App\Repositories\ActionPersonaRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ActionPersonaRepositoryTest extends TestCase
{
    use MakeActionPersonaTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ActionPersonaRepository
     */
    protected $actionPersonaRepo;

    public function setUp()
    {
        parent::setUp();
        $this->actionPersonaRepo = App::make(ActionPersonaRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateActionPersona()
    {
        $actionPersona = $this->fakeActionPersonaData();
        $createdActionPersona = $this->actionPersonaRepo->create($actionPersona);
        $createdActionPersona = $createdActionPersona->toArray();
        $this->assertArrayHasKey('id', $createdActionPersona);
        $this->assertNotNull($createdActionPersona['id'], 'Created ActionPersona must have id specified');
        $this->assertNotNull(ActionPersona::find($createdActionPersona['id']), 'ActionPersona with given id must be in DB');
        $this->assertModelData($actionPersona, $createdActionPersona);
    }

    /**
     * @test read
     */
    public function testReadActionPersona()
    {
        $actionPersona = $this->makeActionPersona();
        $dbActionPersona = $this->actionPersonaRepo->find($actionPersona->id);
        $dbActionPersona = $dbActionPersona->toArray();
        $this->assertModelData($actionPersona->toArray(), $dbActionPersona);
    }

    /**
     * @test update
     */
    public function testUpdateActionPersona()
    {
        $actionPersona = $this->makeActionPersona();
        $fakeActionPersona = $this->fakeActionPersonaData();
        $updatedActionPersona = $this->actionPersonaRepo->update($fakeActionPersona, $actionPersona->id);
        $this->assertModelData($fakeActionPersona, $updatedActionPersona->toArray());
        $dbActionPersona = $this->actionPersonaRepo->find($actionPersona->id);
        $this->assertModelData($fakeActionPersona, $dbActionPersona->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteActionPersona()
    {
        $actionPersona = $this->makeActionPersona();
        $resp = $this->actionPersonaRepo->delete($actionPersona->id);
        $this->assertTrue($resp);
        $this->assertNull(ActionPersona::find($actionPersona->id), 'ActionPersona should not exist in DB');
    }
}
