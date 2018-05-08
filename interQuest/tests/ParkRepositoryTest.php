<?php

use App\Models\Park;
use App\Repositories\ParkRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ParkRepositoryTest extends TestCase
{
    use MakeParkTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ParkRepository
     */
    protected $parkRepo;

    public function setUp()
    {
        parent::setUp();
        $this->parkRepo = App::make(ParkRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatePark()
    {
        $park = $this->fakeParkData();
        $createdPark = $this->parkRepo->create($park);
        $createdPark = $createdPark->toArray();
        $this->assertArrayHasKey('id', $createdPark);
        $this->assertNotNull($createdPark['id'], 'Created Park must have id specified');
        $this->assertNotNull(Park::find($createdPark['id']), 'Park with given id must be in DB');
        $this->assertModelData($park, $createdPark);
    }

    /**
     * @test read
     */
    public function testReadPark()
    {
        $park = $this->makePark();
        $dbPark = $this->parkRepo->find($park->id);
        $dbPark = $dbPark->toArray();
        $this->assertModelData($park->toArray(), $dbPark);
    }

    /**
     * @test update
     */
    public function testUpdatePark()
    {
        $park = $this->makePark();
        $fakePark = $this->fakeParkData();
        $updatedPark = $this->parkRepo->update($fakePark, $park->id);
        $this->assertModelData($fakePark, $updatedPark->toArray());
        $dbPark = $this->parkRepo->find($park->id);
        $this->assertModelData($fakePark, $dbPark->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletePark()
    {
        $park = $this->makePark();
        $resp = $this->parkRepo->delete($park->id);
        $this->assertTrue($resp);
        $this->assertNull(Park::find($park->id), 'Park should not exist in DB');
    }
}
