<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BuildingTerritoryApiTest extends TestCase
{
    use MakeBuildingTerritoryTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateBuildingTerritory()
    {
        $buildingTerritory = $this->fakeBuildingTerritoryData();
        $this->json('POST', '/api/v1/buildingTerritories', $buildingTerritory);

        $this->assertApiResponse($buildingTerritory);
    }

    /**
     * @test
     */
    public function testReadBuildingTerritory()
    {
        $buildingTerritory = $this->makeBuildingTerritory();
        $this->json('GET', '/api/v1/buildingTerritories/'.$buildingTerritory->id);

        $this->assertApiResponse($buildingTerritory->toArray());
    }

    /**
     * @test
     */
    public function testUpdateBuildingTerritory()
    {
        $buildingTerritory = $this->makeBuildingTerritory();
        $editedBuildingTerritory = $this->fakeBuildingTerritoryData();

        $this->json('PUT', '/api/v1/buildingTerritories/'.$buildingTerritory->id, $editedBuildingTerritory);

        $this->assertApiResponse($editedBuildingTerritory);
    }

    /**
     * @test
     */
    public function testDeleteBuildingTerritory()
    {
        $buildingTerritory = $this->makeBuildingTerritory();
        $this->json('DELETE', '/api/v1/buildingTerritories/'.$buildingTerritory->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/buildingTerritories/'.$buildingTerritory->id);

        $this->assertResponseStatus(404);
    }
}
