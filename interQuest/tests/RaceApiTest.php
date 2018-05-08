<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RaceApiTest extends TestCase
{
    use MakeRaceTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateRace()
    {
        $race = $this->fakeRaceData();
        $this->json('POST', '/api/v1/races', $race);

        $this->assertApiResponse($race);
    }

    /**
     * @test
     */
    public function testReadRace()
    {
        $race = $this->makeRace();
        $this->json('GET', '/api/v1/races/'.$race->id);

        $this->assertApiResponse($race->toArray());
    }

    /**
     * @test
     */
    public function testUpdateRace()
    {
        $race = $this->makeRace();
        $editedRace = $this->fakeRaceData();

        $this->json('PUT', '/api/v1/races/'.$race->id, $editedRace);

        $this->assertApiResponse($editedRace);
    }

    /**
     * @test
     */
    public function testDeleteRace()
    {
        $race = $this->makeRace();
        $this->json('DELETE', '/api/v1/races/'.$race->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/races/'.$race->id);

        $this->assertResponseStatus(404);
    }
}
