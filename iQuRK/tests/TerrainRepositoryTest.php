<?php

use App\Models\Terrain;
use App\Repositories\TerrainRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TerrainRepositoryTest extends TestCase
{
    use MakeTerrainTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TerrainRepository
     */
    protected $terrainRepo;

    public function setUp()
    {
        parent::setUp();
        $this->terrainRepo = App::make(TerrainRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateTerrain()
    {
        $terrain = $this->fakeTerrainData();
        $createdTerrain = $this->terrainRepo->create($terrain);
        $createdTerrain = $createdTerrain->toArray();
        $this->assertArrayHasKey('id', $createdTerrain);
        $this->assertNotNull($createdTerrain['id'], 'Created Terrain must have id specified');
        $this->assertNotNull(Terrain::find($createdTerrain['id']), 'Terrain with given id must be in DB');
        $this->assertModelData($terrain, $createdTerrain);
    }

    /**
     * @test read
     */
    public function testReadTerrain()
    {
        $terrain = $this->makeTerrain();
        $dbTerrain = $this->terrainRepo->find($terrain->id);
        $dbTerrain = $dbTerrain->toArray();
        $this->assertModelData($terrain->toArray(), $dbTerrain);
    }

    /**
     * @test update
     */
    public function testUpdateTerrain()
    {
        $terrain = $this->makeTerrain();
        $fakeTerrain = $this->fakeTerrainData();
        $updatedTerrain = $this->terrainRepo->update($fakeTerrain, $terrain->id);
        $this->assertModelData($fakeTerrain, $updatedTerrain->toArray());
        $dbTerrain = $this->terrainRepo->find($terrain->id);
        $this->assertModelData($fakeTerrain, $dbTerrain->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteTerrain()
    {
        $terrain = $this->makeTerrain();
        $resp = $this->terrainRepo->delete($terrain->id);
        $this->assertTrue($resp);
        $this->assertNull(Terrain::find($terrain->id), 'Terrain should not exist in DB');
    }
}
