<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EquipmentPersonaApiTest extends TestCase
{
    use MakeEquipmentPersonaTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateEquipmentPersona()
    {
        $equipmentPersona = $this->fakeEquipmentPersonaData();
        $this->json('POST', '/api/v1/equipmentPersonas', $equipmentPersona);

        $this->assertApiResponse($equipmentPersona);
    }

    /**
     * @test
     */
    public function testReadEquipmentPersona()
    {
        $equipmentPersona = $this->makeEquipmentPersona();
        $this->json('GET', '/api/v1/equipmentPersonas/'.$equipmentPersona->id);

        $this->assertApiResponse($equipmentPersona->toArray());
    }

    /**
     * @test
     */
    public function testUpdateEquipmentPersona()
    {
        $equipmentPersona = $this->makeEquipmentPersona();
        $editedEquipmentPersona = $this->fakeEquipmentPersonaData();

        $this->json('PUT', '/api/v1/equipmentPersonas/'.$equipmentPersona->id, $editedEquipmentPersona);

        $this->assertApiResponse($editedEquipmentPersona);
    }

    /**
     * @test
     */
    public function testDeleteEquipmentPersona()
    {
        $equipmentPersona = $this->makeEquipmentPersona();
        $this->json('DELETE', '/api/v1/equipmentPersonas/'.$equipmentPersona->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/equipmentPersonas/'.$equipmentPersona->id);

        $this->assertResponseStatus(404);
    }
}
