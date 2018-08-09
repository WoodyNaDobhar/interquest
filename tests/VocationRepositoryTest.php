<?php

use App\Models\Vocation;
use App\Repositories\VocationRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class VocationRepositoryTest extends TestCase
{
    use MakeVocationTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var VocationRepository
     */
    protected $vocationRepo;

    public function setUp()
    {
        parent::setUp();
        $this->vocationRepo = App::make(VocationRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateVocation()
    {
        $vocation = $this->fakeVocationData();
        $createdVocation = $this->vocationRepo->create($vocation);
        $createdVocation = $createdVocation->toArray();
        $this->assertArrayHasKey('id', $createdVocation);
        $this->assertNotNull($createdVocation['id'], 'Created Vocation must have id specified');
        $this->assertNotNull(Vocation::find($createdVocation['id']), 'Vocation with given id must be in DB');
        $this->assertModelData($vocation, $createdVocation);
    }

    /**
     * @test read
     */
    public function testReadVocation()
    {
        $vocation = $this->makeVocation();
        $dbVocation = $this->vocationRepo->find($vocation->id);
        $dbVocation = $dbVocation->toArray();
        $this->assertModelData($vocation->toArray(), $dbVocation);
    }

    /**
     * @test update
     */
    public function testUpdateVocation()
    {
        $vocation = $this->makeVocation();
        $fakeVocation = $this->fakeVocationData();
        $updatedVocation = $this->vocationRepo->update($fakeVocation, $vocation->id);
        $this->assertModelData($fakeVocation, $updatedVocation->toArray());
        $dbVocation = $this->vocationRepo->find($vocation->id);
        $this->assertModelData($fakeVocation, $dbVocation->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteVocation()
    {
        $vocation = $this->makeVocation();
        $resp = $this->vocationRepo->delete($vocation->id);
        $this->assertTrue($resp);
        $this->assertNull(Vocation::find($vocation->id), 'Vocation should not exist in DB');
    }
}
