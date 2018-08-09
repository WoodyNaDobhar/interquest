<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FiefApiTest extends TestCase
{
    use MakeFiefTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateFief()
    {
        $fief = $this->fakeFiefData();
        $this->json('POST', '/api/v1/fiefs', $fief);

        $this->assertApiResponse($fief);
    }

    /**
     * @test
     */
    public function testReadFief()
    {
        $fief = $this->makeFief();
        $this->json('GET', '/api/v1/fiefs/'.$fief->id);

        $this->assertApiResponse($fief->toArray());
    }

    /**
     * @test
     */
    public function testUpdateFief()
    {
        $fief = $this->makeFief();
        $editedFief = $this->fakeFiefData();

        $this->json('PUT', '/api/v1/fiefs/'.$fief->id, $editedFief);

        $this->assertApiResponse($editedFief);
    }

    /**
     * @test
     */
    public function testDeleteFief()
    {
        $fief = $this->makeFief();
        $this->json('DELETE', '/api/v1/fiefs/'.$fief->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/fiefs/'.$fief->id);

        $this->assertResponseStatus(404);
    }
}
