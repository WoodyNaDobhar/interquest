<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ParkApiTest extends TestCase
{
    use MakeParkTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatePark()
    {
        $park = $this->fakeParkData();
        $this->json('POST', '/api/v1/parks', $park);

        $this->assertApiResponse($park);
    }

    /**
     * @test
     */
    public function testReadPark()
    {
        $park = $this->makePark();
        $this->json('GET', '/api/v1/parks/'.$park->id);

        $this->assertApiResponse($park->toArray());
    }

    /**
     * @test
     */
    public function testUpdatePark()
    {
        $park = $this->makePark();
        $editedPark = $this->fakeParkData();

        $this->json('PUT', '/api/v1/parks/'.$park->id, $editedPark);

        $this->assertApiResponse($editedPark);
    }

    /**
     * @test
     */
    public function testDeletePark()
    {
        $park = $this->makePark();
        $this->json('DELETE', '/api/v1/parks/'.$park->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/parks/'.$park->id);

        $this->assertResponseStatus(404);
    }
}
