<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TerritoryApiTest extends TestCase
{
    use MakeTerritoryTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateTerritory()
    {
        $territory = $this->fakeTerritoryData();
        $this->json('POST', '/api/v1/territories', $territory);

        $this->assertApiResponse($territory);
    }

    /**
     * @test
     */
    public function testReadTerritory()
    {
        $territory = $this->makeTerritory();
        $this->json('GET', '/api/v1/territories/'.$territory->id);

        $this->assertApiResponse($territory->toArray());
    }

    /**
     * @test
     */
    public function testUpdateTerritory()
    {
        $territory = $this->makeTerritory();
        $editedTerritory = $this->fakeTerritoryData();

        $this->json('PUT', '/api/v1/territories/'.$territory->id, $editedTerritory);

        $this->assertApiResponse($editedTerritory);
    }

    /**
     * @test
     */
    public function testDeleteTerritory()
    {
        $territory = $this->makeTerritory();
        $this->json('DELETE', '/api/v1/territories/'.$territory->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/territories/'.$territory->id);

        $this->assertResponseStatus(404);
    }
}
