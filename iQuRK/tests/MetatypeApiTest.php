<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MetatypeApiTest extends TestCase
{
    use MakeMetatypeTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateMetatype()
    {
        $metatype = $this->fakeMetatypeData();
        $this->json('POST', '/api/v1/metatypes', $metatype);

        $this->assertApiResponse($metatype);
    }

    /**
     * @test
     */
    public function testReadMetatype()
    {
        $metatype = $this->makeMetatype();
        $this->json('GET', '/api/v1/metatypes/'.$metatype->id);

        $this->assertApiResponse($metatype->toArray());
    }

    /**
     * @test
     */
    public function testUpdateMetatype()
    {
        $metatype = $this->makeMetatype();
        $editedMetatype = $this->fakeMetatypeData();

        $this->json('PUT', '/api/v1/metatypes/'.$metatype->id, $editedMetatype);

        $this->assertApiResponse($editedMetatype);
    }

    /**
     * @test
     */
    public function testDeleteMetatype()
    {
        $metatype = $this->makeMetatype();
        $this->json('DELETE', '/api/v1/metatypes/'.$metatype->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/metatypes/'.$metatype->id);

        $this->assertResponseStatus(404);
    }
}
