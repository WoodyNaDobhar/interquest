<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class NpcApiTest extends TestCase
{
    use MakeNpcTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateNpc()
    {
        $npc = $this->fakeNpcData();
        $this->json('POST', '/api/v1/npcs', $npc);

        $this->assertApiResponse($npc);
    }

    /**
     * @test
     */
    public function testReadNpc()
    {
        $npc = $this->makeNpc();
        $this->json('GET', '/api/v1/npcs/'.$npc->id);

        $this->assertApiResponse($npc->toArray());
    }

    /**
     * @test
     */
    public function testUpdateNpc()
    {
        $npc = $this->makeNpc();
        $editedNpc = $this->fakeNpcData();

        $this->json('PUT', '/api/v1/npcs/'.$npc->id, $editedNpc);

        $this->assertApiResponse($editedNpc);
    }

    /**
     * @test
     */
    public function testDeleteNpc()
    {
        $npc = $this->makeNpc();
        $this->json('DELETE', '/api/v1/npcs/'.$npc->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/npcs/'.$npc->id);

        $this->assertResponseStatus(404);
    }
}
