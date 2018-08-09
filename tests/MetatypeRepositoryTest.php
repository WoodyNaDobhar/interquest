<?php

use App\Models\Metatype;
use App\Repositories\MetatypeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MetatypeRepositoryTest extends TestCase
{
    use MakeMetatypeTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var MetatypeRepository
     */
    protected $metatypeRepo;

    public function setUp()
    {
        parent::setUp();
        $this->metatypeRepo = App::make(MetatypeRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateMetatype()
    {
        $metatype = $this->fakeMetatypeData();
        $createdMetatype = $this->metatypeRepo->create($metatype);
        $createdMetatype = $createdMetatype->toArray();
        $this->assertArrayHasKey('id', $createdMetatype);
        $this->assertNotNull($createdMetatype['id'], 'Created Metatype must have id specified');
        $this->assertNotNull(Metatype::find($createdMetatype['id']), 'Metatype with given id must be in DB');
        $this->assertModelData($metatype, $createdMetatype);
    }

    /**
     * @test read
     */
    public function testReadMetatype()
    {
        $metatype = $this->makeMetatype();
        $dbMetatype = $this->metatypeRepo->find($metatype->id);
        $dbMetatype = $dbMetatype->toArray();
        $this->assertModelData($metatype->toArray(), $dbMetatype);
    }

    /**
     * @test update
     */
    public function testUpdateMetatype()
    {
        $metatype = $this->makeMetatype();
        $fakeMetatype = $this->fakeMetatypeData();
        $updatedMetatype = $this->metatypeRepo->update($fakeMetatype, $metatype->id);
        $this->assertModelData($fakeMetatype, $updatedMetatype->toArray());
        $dbMetatype = $this->metatypeRepo->find($metatype->id);
        $this->assertModelData($fakeMetatype, $dbMetatype->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteMetatype()
    {
        $metatype = $this->makeMetatype();
        $resp = $this->metatypeRepo->delete($metatype->id);
        $this->assertTrue($resp);
        $this->assertNull(Metatype::find($metatype->id), 'Metatype should not exist in DB');
    }
}
