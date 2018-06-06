<?php

use App\Models\BuildingTerritory;
use App\Repositories\BuildingTerritoryRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BuildingTerritoryRepositoryTest extends TestCase
{
    use MakeBuildingTerritoryTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var BuildingTerritoryRepository
     */
    protected $buildingTerritoryRepo;

    public function setUp()
    {
        parent::setUp();
        $this->buildingTerritoryRepo = App::make(BuildingTerritoryRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateBuildingTerritory()
    {
        $buildingTerritory = $this->fakeBuildingTerritoryData();
        $createdBuildingTerritory = $this->buildingTerritoryRepo->create($buildingTerritory);
        $createdBuildingTerritory = $createdBuildingTerritory->toArray();
        $this->assertArrayHasKey('id', $createdBuildingTerritory);
        $this->assertNotNull($createdBuildingTerritory['id'], 'Created BuildingTerritory must have id specified');
        $this->assertNotNull(BuildingTerritory::find($createdBuildingTerritory['id']), 'BuildingTerritory with given id must be in DB');
        $this->assertModelData($buildingTerritory, $createdBuildingTerritory);
    }

    /**
     * @test read
     */
    public function testReadBuildingTerritory()
    {
        $buildingTerritory = $this->makeBuildingTerritory();
        $dbBuildingTerritory = $this->buildingTerritoryRepo->find($buildingTerritory->id);
        $dbBuildingTerritory = $dbBuildingTerritory->toArray();
        $this->assertModelData($buildingTerritory->toArray(), $dbBuildingTerritory);
    }

    /**
     * @test update
     */
    public function testUpdateBuildingTerritory()
    {
        $buildingTerritory = $this->makeBuildingTerritory();
        $fakeBuildingTerritory = $this->fakeBuildingTerritoryData();
        $updatedBuildingTerritory = $this->buildingTerritoryRepo->update($fakeBuildingTerritory, $buildingTerritory->id);
        $this->assertModelData($fakeBuildingTerritory, $updatedBuildingTerritory->toArray());
        $dbBuildingTerritory = $this->buildingTerritoryRepo->find($buildingTerritory->id);
        $this->assertModelData($fakeBuildingTerritory, $dbBuildingTerritory->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteBuildingTerritory()
    {
        $buildingTerritory = $this->makeBuildingTerritory();
        $resp = $this->buildingTerritoryRepo->delete($buildingTerritory->id);
        $this->assertTrue($resp);
        $this->assertNull(BuildingTerritory::find($buildingTerritory->id), 'BuildingTerritory should not exist in DB');
    }
}
