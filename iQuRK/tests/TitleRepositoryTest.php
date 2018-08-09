<?php

use App\Models\Title;
use App\Repositories\TitleRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TitleRepositoryTest extends TestCase
{
    use MakeTitleTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TitleRepository
     */
    protected $titleRepo;

    public function setUp()
    {
        parent::setUp();
        $this->titleRepo = App::make(TitleRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateTitle()
    {
        $title = $this->fakeTitleData();
        $createdTitle = $this->titleRepo->create($title);
        $createdTitle = $createdTitle->toArray();
        $this->assertArrayHasKey('id', $createdTitle);
        $this->assertNotNull($createdTitle['id'], 'Created Title must have id specified');
        $this->assertNotNull(Title::find($createdTitle['id']), 'Title with given id must be in DB');
        $this->assertModelData($title, $createdTitle);
    }

    /**
     * @test read
     */
    public function testReadTitle()
    {
        $title = $this->makeTitle();
        $dbTitle = $this->titleRepo->find($title->id);
        $dbTitle = $dbTitle->toArray();
        $this->assertModelData($title->toArray(), $dbTitle);
    }

    /**
     * @test update
     */
    public function testUpdateTitle()
    {
        $title = $this->makeTitle();
        $fakeTitle = $this->fakeTitleData();
        $updatedTitle = $this->titleRepo->update($fakeTitle, $title->id);
        $this->assertModelData($fakeTitle, $updatedTitle->toArray());
        $dbTitle = $this->titleRepo->find($title->id);
        $this->assertModelData($fakeTitle, $dbTitle->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteTitle()
    {
        $title = $this->makeTitle();
        $resp = $this->titleRepo->delete($title->id);
        $this->assertTrue($resp);
        $this->assertNull(Title::find($title->id), 'Title should not exist in DB');
    }
}
