<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TitleApiTest extends TestCase
{
    use MakeTitleTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateTitle()
    {
        $title = $this->fakeTitleData();
        $this->json('POST', '/api/v1/titles', $title);

        $this->assertApiResponse($title);
    }

    /**
     * @test
     */
    public function testReadTitle()
    {
        $title = $this->makeTitle();
        $this->json('GET', '/api/v1/titles/'.$title->id);

        $this->assertApiResponse($title->toArray());
    }

    /**
     * @test
     */
    public function testUpdateTitle()
    {
        $title = $this->makeTitle();
        $editedTitle = $this->fakeTitleData();

        $this->json('PUT', '/api/v1/titles/'.$title->id, $editedTitle);

        $this->assertApiResponse($editedTitle);
    }

    /**
     * @test
     */
    public function testDeleteTitle()
    {
        $title = $this->makeTitle();
        $this->json('DELETE', '/api/v1/titles/'.$title->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/titles/'.$title->id);

        $this->assertResponseStatus(404);
    }
}
