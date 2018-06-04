<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ActionPersonaApiTest extends TestCase
{
    use MakeActionPersonaTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateActionPersona()
    {
        $actionPersona = $this->fakeActionPersonaData();
        $this->json('POST', '/api/v1/actionPersonas', $actionPersona);

        $this->assertApiResponse($actionPersona);
    }

    /**
     * @test
     */
    public function testReadActionPersona()
    {
        $actionPersona = $this->makeActionPersona();
        $this->json('GET', '/api/v1/actionPersonas/'.$actionPersona->id);

        $this->assertApiResponse($actionPersona->toArray());
    }

    /**
     * @test
     */
    public function testUpdateActionPersona()
    {
        $actionPersona = $this->makeActionPersona();
        $editedActionPersona = $this->fakeActionPersonaData();

        $this->json('PUT', '/api/v1/actionPersonas/'.$actionPersona->id, $editedActionPersona);

        $this->assertApiResponse($editedActionPersona);
    }

    /**
     * @test
     */
    public function testDeleteActionPersona()
    {
        $actionPersona = $this->makeActionPersona();
        $this->json('DELETE', '/api/v1/actionPersonas/'.$actionPersona->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/actionPersonas/'.$actionPersona->id);

        $this->assertResponseStatus(404);
    }
}
