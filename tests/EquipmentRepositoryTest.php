<?php

use App\Models\Equipment;
use App\Repositories\EquipmentRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EquipmentRepositoryTest extends TestCase
{
    use MakeEquipmentTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var EquipmentRepository
     */
    protected $equipmentRepo;

    public function setUp()
    {
        parent::setUp();
        $this->equipmentRepo = App::make(EquipmentRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateEquipment()
    {
        $equipment = $this->fakeEquipmentData();
        $createdEquipment = $this->equipmentRepo->create($equipment);
        $createdEquipment = $createdEquipment->toArray();
        $this->assertArrayHasKey('id', $createdEquipment);
        $this->assertNotNull($createdEquipment['id'], 'Created Equipment must have id specified');
        $this->assertNotNull(Equipment::find($createdEquipment['id']), 'Equipment with given id must be in DB');
        $this->assertModelData($equipment, $createdEquipment);
    }

    /**
     * @test read
     */
    public function testReadEquipment()
    {
        $equipment = $this->makeEquipment();
        $dbEquipment = $this->equipmentRepo->find($equipment->id);
        $dbEquipment = $dbEquipment->toArray();
        $this->assertModelData($equipment->toArray(), $dbEquipment);
    }

    /**
     * @test update
     */
    public function testUpdateEquipment()
    {
        $equipment = $this->makeEquipment();
        $fakeEquipment = $this->fakeEquipmentData();
        $updatedEquipment = $this->equipmentRepo->update($fakeEquipment, $equipment->id);
        $this->assertModelData($fakeEquipment, $updatedEquipment->toArray());
        $dbEquipment = $this->equipmentRepo->find($equipment->id);
        $this->assertModelData($fakeEquipment, $dbEquipment->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteEquipment()
    {
        $equipment = $this->makeEquipment();
        $resp = $this->equipmentRepo->delete($equipment->id);
        $this->assertTrue($resp);
        $this->assertNull(Equipment::find($equipment->id), 'Equipment should not exist in DB');
    }
}
