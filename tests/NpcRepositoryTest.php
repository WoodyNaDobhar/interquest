<?php

use App\Models\Npc;
use App\Repositories\NpcRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class NpcRepositoryTest extends TestCase
{
    use MakeNpcTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var NpcRepository
     */
    protected $npcRepo;

    public function setUp()
    {
        parent::setUp();
        $this->npcRepo = App::make(NpcRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateNpc()
    {
        $npc = $this->fakeNpcData();
        $createdNpc = $this->npcRepo->create($npc);
        $createdNpc = $createdNpc->toArray();
        $this->assertArrayHasKey('id', $createdNpc);
        $this->assertNotNull($createdNpc['id'], 'Created Npc must have id specified');
        $this->assertNotNull(Npc::find($createdNpc['id']), 'Npc with given id must be in DB');
        $this->assertModelData($npc, $createdNpc);
    }

    /**
     * @test read
     */
    public function testReadNpc()
    {
        $npc = $this->makeNpc();
        $dbNpc = $this->npcRepo->find($npc->id);
        $dbNpc = $dbNpc->toArray();
        $this->assertModelData($npc->toArray(), $dbNpc);
    }

    /**
     * @test update
     */
    public function testUpdateNpc()
    {
        $npc = $this->makeNpc();
        $fakeNpc = $this->fakeNpcData();
        $updatedNpc = $this->npcRepo->update($fakeNpc, $npc->id);
        $this->assertModelData($fakeNpc, $updatedNpc->toArray());
        $dbNpc = $this->npcRepo->find($npc->id);
        $this->assertModelData($fakeNpc, $dbNpc->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteNpc()
    {
        $npc = $this->makeNpc();
        $resp = $this->npcRepo->delete($npc->id);
        $this->assertTrue($resp);
        $this->assertNull(Npc::find($npc->id), 'Npc should not exist in DB');
    }
}
