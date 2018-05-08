<?php

use App\Models\Race;
use App\Repositories\RaceRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RaceRepositoryTest extends TestCase
{
    use MakeRaceTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var RaceRepository
     */
    protected $raceRepo;

    public function setUp()
    {
        parent::setUp();
        $this->raceRepo = App::make(RaceRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateRace()
    {
        $race = $this->fakeRaceData();
        $createdRace = $this->raceRepo->create($race);
        $createdRace = $createdRace->toArray();
        $this->assertArrayHasKey('id', $createdRace);
        $this->assertNotNull($createdRace['id'], 'Created Race must have id specified');
        $this->assertNotNull(Race::find($createdRace['id']), 'Race with given id must be in DB');
        $this->assertModelData($race, $createdRace);
    }

    /**
     * @test read
     */
    public function testReadRace()
    {
        $race = $this->makeRace();
        $dbRace = $this->raceRepo->find($race->id);
        $dbRace = $dbRace->toArray();
        $this->assertModelData($race->toArray(), $dbRace);
    }

    /**
     * @test update
     */
    public function testUpdateRace()
    {
        $race = $this->makeRace();
        $fakeRace = $this->fakeRaceData();
        $updatedRace = $this->raceRepo->update($fakeRace, $race->id);
        $this->assertModelData($fakeRace, $updatedRace->toArray());
        $dbRace = $this->raceRepo->find($race->id);
        $this->assertModelData($fakeRace, $dbRace->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteRace()
    {
        $race = $this->makeRace();
        $resp = $this->raceRepo->delete($race->id);
        $this->assertTrue($resp);
        $this->assertNull(Race::find($race->id), 'Race should not exist in DB');
    }
}
