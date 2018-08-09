<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class VocationApiTest extends TestCase
{
    use MakeVocationTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateVocation()
    {
        $vocation = $this->fakeVocationData();
        $this->json('POST', '/api/v1/vocations', $vocation);

        $this->assertApiResponse($vocation);
    }

    /**
     * @test
     */
    public function testReadVocation()
    {
        $vocation = $this->makeVocation();
        $this->json('GET', '/api/v1/vocations/'.$vocation->id);

        $this->assertApiResponse($vocation->toArray());
    }

    /**
     * @test
     */
    public function testUpdateVocation()
    {
        $vocation = $this->makeVocation();
        $editedVocation = $this->fakeVocationData();

        $this->json('PUT', '/api/v1/vocations/'.$vocation->id, $editedVocation);

        $this->assertApiResponse($editedVocation);
    }

    /**
     * @test
     */
    public function testDeleteVocation()
    {
        $vocation = $this->makeVocation();
        $this->json('DELETE', '/api/v1/vocations/'.$vocation->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/vocations/'.$vocation->id);

        $this->assertResponseStatus(404);
    }
}
