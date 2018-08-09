<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EquipmentApiTest extends TestCase
{
    use MakeEquipmentTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateEquipment()
    {
        $equipment = $this->fakeEquipmentData();
        $this->json('POST', '/api/v1/equipment', $equipment);

        $this->assertApiResponse($equipment);
    }

    /**
     * @test
     */
    public function testReadEquipment()
    {
        $equipment = $this->makeEquipment();
        $this->json('GET', '/api/v1/equipment/'.$equipment->id);

        $this->assertApiResponse($equipment->toArray());
    }

    /**
     * @test
     */
    public function testUpdateEquipment()
    {
        $equipment = $this->makeEquipment();
        $editedEquipment = $this->fakeEquipmentData();

        $this->json('PUT', '/api/v1/equipment/'.$equipment->id, $editedEquipment);

        $this->assertApiResponse($editedEquipment);
    }

    /**
     * @test
     */
    public function testDeleteEquipment()
    {
        $equipment = $this->makeEquipment();
        $this->json('DELETE', '/api/v1/equipment/'.$equipment->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/equipment/'.$equipment->id);

        $this->assertResponseStatus(404);
    }
}
