<?php

use App\Models\Action;
use App\Repositories\ActionRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ActionRepositoryTest extends TestCase
{
    use MakeActionTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ActionRepository
     */
    protected $actionRepo;

    public function setUp()
    {
        parent::setUp();
        $this->actionRepo = App::make(ActionRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateAction()
    {
        $action = $this->fakeActionData();
        $createdAction = $this->actionRepo->create($action);
        $createdAction = $createdAction->toArray();
        $this->assertArrayHasKey('id', $createdAction);
        $this->assertNotNull($createdAction['id'], 'Created Action must have id specified');
        $this->assertNotNull(Action::find($createdAction['id']), 'Action with given id must be in DB');
        $this->assertModelData($action, $createdAction);
    }

    /**
     * @test read
     */
    public function testReadAction()
    {
        $action = $this->makeAction();
        $dbAction = $this->actionRepo->find($action->id);
        $dbAction = $dbAction->toArray();
        $this->assertModelData($action->toArray(), $dbAction);
    }

    /**
     * @test update
     */
    public function testUpdateAction()
    {
        $action = $this->makeAction();
        $fakeAction = $this->fakeActionData();
        $updatedAction = $this->actionRepo->update($fakeAction, $action->id);
        $this->assertModelData($fakeAction, $updatedAction->toArray());
        $dbAction = $this->actionRepo->find($action->id);
        $this->assertModelData($fakeAction, $dbAction->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteAction()
    {
        $action = $this->makeAction();
        $resp = $this->actionRepo->delete($action->id);
        $this->assertTrue($resp);
        $this->assertNull(Action::find($action->id), 'Action should not exist in DB');
    }
}
