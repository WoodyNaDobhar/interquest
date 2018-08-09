<?php

use App\Models\Fief;
use App\Repositories\FiefRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FiefRepositoryTest extends TestCase
{
    use MakeFiefTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var FiefRepository
     */
    protected $fiefRepo;

    public function setUp()
    {
        parent::setUp();
        $this->fiefRepo = App::make(FiefRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateFief()
    {
        $fief = $this->fakeFiefData();
        $createdFief = $this->fiefRepo->create($fief);
        $createdFief = $createdFief->toArray();
        $this->assertArrayHasKey('id', $createdFief);
        $this->assertNotNull($createdFief['id'], 'Created Fief must have id specified');
        $this->assertNotNull(Fief::find($createdFief['id']), 'Fief with given id must be in DB');
        $this->assertModelData($fief, $createdFief);
    }

    /**
     * @test read
     */
    public function testReadFief()
    {
        $fief = $this->makeFief();
        $dbFief = $this->fiefRepo->find($fief->id);
        $dbFief = $dbFief->toArray();
        $this->assertModelData($fief->toArray(), $dbFief);
    }

    /**
     * @test update
     */
    public function testUpdateFief()
    {
        $fief = $this->makeFief();
        $fakeFief = $this->fakeFiefData();
        $updatedFief = $this->fiefRepo->update($fakeFief, $fief->id);
        $this->assertModelData($fakeFief, $updatedFief->toArray());
        $dbFief = $this->fiefRepo->find($fief->id);
        $this->assertModelData($fakeFief, $dbFief->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteFief()
    {
        $fief = $this->makeFief();
        $resp = $this->fiefRepo->delete($fief->id);
        $this->assertTrue($resp);
        $this->assertNull(Fief::find($fief->id), 'Fief should not exist in DB');
    }
}
