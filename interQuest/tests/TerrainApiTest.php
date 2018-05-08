<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TerrainApiTest extends TestCase
{
    use MakeTerrainTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateTerrain()
    {
        $terrain = $this->fakeTerrainData();
        $this->json('POST', '/api/v1/terrains', $terrain);

        $this->assertApiResponse($terrain);
    }

    /**
     * @test
     */
    public function testReadTerrain()
    {
        $terrain = $this->makeTerrain();
        $this->json('GET', '/api/v1/terrains/'.$terrain->id);

        $this->assertApiResponse($terrain->toArray());
    }

    /**
     * @test
     */
    public function testUpdateTerrain()
    {
        $terrain = $this->makeTerrain();
        $editedTerrain = $this->fakeTerrainData();

        $this->json('PUT', '/api/v1/terrains/'.$terrain->id, $editedTerrain);

        $this->assertApiResponse($editedTerrain);
    }

    /**
     * @test
     */
    public function testDeleteTerrain()
    {
        $terrain = $this->makeTerrain();
        $this->json('DELETE', '/api/v1/terrains/'.$terrain->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/terrains/'.$terrain->id);

        $this->assertResponseStatus(404);
    }
}
