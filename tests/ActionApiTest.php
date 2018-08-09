<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ActionApiTest extends TestCase
{
    use MakeActionTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateAction()
    {
        $action = $this->fakeActionData();
        $this->json('POST', '/api/v1/actions', $action);

        $this->assertApiResponse($action);
    }

    /**
     * @test
     */
    public function testReadAction()
    {
        $action = $this->makeAction();
        $this->json('GET', '/api/v1/actions/'.$action->id);

        $this->assertApiResponse($action->toArray());
    }

    /**
     * @test
     */
    public function testUpdateAction()
    {
        $action = $this->makeAction();
        $editedAction = $this->fakeActionData();

        $this->json('PUT', '/api/v1/actions/'.$action->id, $editedAction);

        $this->assertApiResponse($editedAction);
    }

    /**
     * @test
     */
    public function testDeleteAction()
    {
        $action = $this->makeAction();
        $this->json('DELETE', '/api/v1/actions/'.$action->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/actions/'.$action->id);

        $this->assertResponseStatus(404);
    }
}
