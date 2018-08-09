<?php

use App\Models\Fiefdom;
use App\Repositories\FiefdomRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FiefdomRepositoryTest extends TestCase
{
    use MakeFiefdomTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var FiefdomRepository
     */
    protected $fiefdomRepo;

    public function setUp()
    {
        parent::setUp();
        $this->fiefdomRepo = App::make(FiefdomRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateFiefdom()
    {
        $fiefdom = $this->fakeFiefdomData();
        $createdFiefdom = $this->fiefdomRepo->create($fiefdom);
        $createdFiefdom = $createdFiefdom->toArray();
        $this->assertArrayHasKey('id', $createdFiefdom);
        $this->assertNotNull($createdFiefdom['id'], 'Created Fiefdom must have id specified');
        $this->assertNotNull(Fiefdom::find($createdFiefdom['id']), 'Fiefdom with given id must be in DB');
        $this->assertModelData($fiefdom, $createdFiefdom);
    }

    /**
     * @test read
     */
    public function testReadFiefdom()
    {
        $fiefdom = $this->makeFiefdom();
        $dbFiefdom = $this->fiefdomRepo->find($fiefdom->id);
        $dbFiefdom = $dbFiefdom->toArray();
        $this->assertModelData($fiefdom->toArray(), $dbFiefdom);
    }

    /**
     * @test update
     */
    public function testUpdateFiefdom()
    {
        $fiefdom = $this->makeFiefdom();
        $fakeFiefdom = $this->fakeFiefdomData();
        $updatedFiefdom = $this->fiefdomRepo->update($fakeFiefdom, $fiefdom->id);
        $this->assertModelData($fakeFiefdom, $updatedFiefdom->toArray());
        $dbFiefdom = $this->fiefdomRepo->find($fiefdom->id);
        $this->assertModelData($fakeFiefdom, $dbFiefdom->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteFiefdom()
    {
        $fiefdom = $this->makeFiefdom();
        $resp = $this->fiefdomRepo->delete($fiefdom->id);
        $this->assertTrue($resp);
        $this->assertNull(Fiefdom::find($fiefdom->id), 'Fiefdom should not exist in DB');
    }
}
