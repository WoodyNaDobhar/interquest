<?php

use App\Models\EquipmentPersona;
use App\Repositories\EquipmentPersonaRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EquipmentPersonaRepositoryTest extends TestCase
{
    use MakeEquipmentPersonaTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var EquipmentPersonaRepository
     */
    protected $equipmentPersonaRepo;

    public function setUp()
    {
        parent::setUp();
        $this->equipmentPersonaRepo = App::make(EquipmentPersonaRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateEquipmentPersona()
    {
        $equipmentPersona = $this->fakeEquipmentPersonaData();
        $createdEquipmentPersona = $this->equipmentPersonaRepo->create($equipmentPersona);
        $createdEquipmentPersona = $createdEquipmentPersona->toArray();
        $this->assertArrayHasKey('id', $createdEquipmentPersona);
        $this->assertNotNull($createdEquipmentPersona['id'], 'Created EquipmentPersona must have id specified');
        $this->assertNotNull(EquipmentPersona::find($createdEquipmentPersona['id']), 'EquipmentPersona with given id must be in DB');
        $this->assertModelData($equipmentPersona, $createdEquipmentPersona);
    }

    /**
     * @test read
     */
    public function testReadEquipmentPersona()
    {
        $equipmentPersona = $this->makeEquipmentPersona();
        $dbEquipmentPersona = $this->equipmentPersonaRepo->find($equipmentPersona->id);
        $dbEquipmentPersona = $dbEquipmentPersona->toArray();
        $this->assertModelData($equipmentPersona->toArray(), $dbEquipmentPersona);
    }

    /**
     * @test update
     */
    public function testUpdateEquipmentPersona()
    {
        $equipmentPersona = $this->makeEquipmentPersona();
        $fakeEquipmentPersona = $this->fakeEquipmentPersonaData();
        $updatedEquipmentPersona = $this->equipmentPersonaRepo->update($fakeEquipmentPersona, $equipmentPersona->id);
        $this->assertModelData($fakeEquipmentPersona, $updatedEquipmentPersona->toArray());
        $dbEquipmentPersona = $this->equipmentPersonaRepo->find($equipmentPersona->id);
        $this->assertModelData($fakeEquipmentPersona, $dbEquipmentPersona->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteEquipmentPersona()
    {
        $equipmentPersona = $this->makeEquipmentPersona();
        $resp = $this->equipmentPersonaRepo->delete($equipmentPersona->id);
        $this->assertTrue($resp);
        $this->assertNull(EquipmentPersona::find($equipmentPersona->id), 'EquipmentPersona should not exist in DB');
    }
}
