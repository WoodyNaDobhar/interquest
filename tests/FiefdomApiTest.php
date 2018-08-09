<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FiefdomApiTest extends TestCase
{
    use MakeFiefdomTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateFiefdom()
    {
        $fiefdom = $this->fakeFiefdomData();
        $this->json('POST', '/api/v1/fiefdoms', $fiefdom);

        $this->assertApiResponse($fiefdom);
    }

    /**
     * @test
     */
    public function testReadFiefdom()
    {
        $fiefdom = $this->makeFiefdom();
        $this->json('GET', '/api/v1/fiefdoms/'.$fiefdom->id);

        $this->assertApiResponse($fiefdom->toArray());
    }

    /**
     * @test
     */
    public function testUpdateFiefdom()
    {
        $fiefdom = $this->makeFiefdom();
        $editedFiefdom = $this->fakeFiefdomData();

        $this->json('PUT', '/api/v1/fiefdoms/'.$fiefdom->id, $editedFiefdom);

        $this->assertApiResponse($editedFiefdom);
    }

    /**
     * @test
     */
    public function testDeleteFiefdom()
    {
        $fiefdom = $this->makeFiefdom();
        $this->json('DELETE', '/api/v1/fiefdoms/'.$fiefdom->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/fiefdoms/'.$fiefdom->id);

        $this->assertResponseStatus(404);
    }
}
