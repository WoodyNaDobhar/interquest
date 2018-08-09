<?php

use App\Models\Territory;
use App\Repositories\TerritoryRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TerritoryRepositoryTest extends TestCase
{
    use MakeTerritoryTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TerritoryRepository
     */
    protected $territoryRepo;

    public function setUp()
    {
        parent::setUp();
        $this->territoryRepo = App::make(TerritoryRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateTerritory()
    {
        $territory = $this->fakeTerritoryData();
        $createdTerritory = $this->territoryRepo->create($territory);
        $createdTerritory = $createdTerritory->toArray();
        $this->assertArrayHasKey('id', $createdTerritory);
        $this->assertNotNull($createdTerritory['id'], 'Created Territory must have id specified');
        $this->assertNotNull(Territory::find($createdTerritory['id']), 'Territory with given id must be in DB');
        $this->assertModelData($territory, $createdTerritory);
    }

    /**
     * @test read
     */
    public function testReadTerritory()
    {
        $territory = $this->makeTerritory();
        $dbTerritory = $this->territoryRepo->find($territory->id);
        $dbTerritory = $dbTerritory->toArray();
        $this->assertModelData($territory->toArray(), $dbTerritory);
    }

    /**
     * @test update
     */
    public function testUpdateTerritory()
    {
        $territory = $this->makeTerritory();
        $fakeTerritory = $this->fakeTerritoryData();
        $updatedTerritory = $this->territoryRepo->update($fakeTerritory, $territory->id);
        $this->assertModelData($fakeTerritory, $updatedTerritory->toArray());
        $dbTerritory = $this->territoryRepo->find($territory->id);
        $this->assertModelData($fakeTerritory, $dbTerritory->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteTerritory()
    {
        $territory = $this->makeTerritory();
        $resp = $this->territoryRepo->delete($territory->id);
        $this->assertTrue($resp);
        $this->assertNull(Territory::find($territory->id), 'Territory should not exist in DB');
    }
}
